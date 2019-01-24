/* ------------------------------------------------------------------------------
 *
 *  # Echarts - Bar and Tornado charts
 *
 *  Demo JS code for echarts_bars_tornados.html page
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var EchartsBarsTornados = function() {


    //
    // Setup module components
    //

    // Bar and tornado charts
    var _barsTornadosExamples = function() {
        if (typeof echarts == 'undefined') {
            console.warn('Warning - echarts.min.js is not loaded.');
            return;
        }

        // Define elements
        var bars_basic_element = document.getElementById('bars_basic');


        //
        // Charts configuration
        //

        // Basic bar chart
        if (bars_basic_element) {

            // Initialize chart
            var bars_basic = echarts.init(bars_basic_element);


            //
            // Chart config
            //

            // Options
            bars_basic.setOption({

                // Global text styles
                textStyle: {
                    fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                    fontSize: 13
                },

                // Chart animation duration
                animationDuration: 750,

                // Setup grid
                grid: {
                    left: 0,
                    right: 30,
                    top: 35,
                    bottom: 0,
                    containLabel: true
                },

                // Add legend
                legend: {
                    data: ['PRESUPUESTO UTILIZADO (S/.)', 'PRESUPUESTO TOTAL (S/.)'],
                    itemHeight: 8,
                    itemGap: 20,
                    textStyle: {
                        padding: [0, 5]
                    }
                },

                // Add tooltip
                tooltip: {
                    trigger: 'axis',
                    backgroundColor: 'rgba(0,0,0,0.75)',
                    padding: [10, 15],
                    textStyle: {
                        fontSize: 13,
                        fontFamily: 'Roboto, sans-serif'
                    },
                    axisPointer: {
                        type: 'shadow',
                        shadowStyle: {
                            color: 'rgba(0,0,0,0.025)'
                        }
                    }
                },

                // Horizontal axis
                xAxis: [{
                    type: 'value',
                    boundaryGap: [0, 0.01],
                    axisLabel: {
                        color: '#333'
                    },
                    axisLine: {
                        lineStyle: {
                            color: '#999'
                        }
                    },
                    splitLine: {
                        show: true,
                        lineStyle: {
                            color: '#eee',
                            type: 'dashed'
                        }
                    }
                }],

                // Vertical axis
                yAxis: [{
                    type: 'category',
                    data: arrCategoriasxetapas,
                    axisLabel: {
                        color: '#333'
                    },
                    axisLine: {
                        lineStyle: {
                            color: '#999'
                        }
                    },
                    splitLine: {
                        show: true,
                        lineStyle: {
                            color: ['#eee']
                        }
                    },
                    splitArea: {
                        show: true,
                        areaStyle: {
                            color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.015)']
                        }
                    }
                }],

                // Add series
                series: [
                    {
                        name: 'PRESUPUESTO UTILIZADO (S/.)',
                        type: 'bar',
                        itemStyle: {
                            normal: {
                                color: '#EF5350'
                            }
                        },
                        data: arrEtapasxCategoriaUtilizado
                    },
                    {
                        name: 'PRESUPUESTO TOTAL (S/.)',
                        type: 'bar',
                        itemStyle: {
                            normal: {
                                color: '#66BB6A'
                            }
                        },
                        data: arrEtapasxCategoriaTotal
                    }
                ]
            });
        }
        //
        // Resize charts
        //

        // Resize function
        var triggerChartResize = function() {
            bars_basic_element && bars_basic.resize();
        };

        // On sidebar width change
        $(document).on('click', '.sidebar-control', function() {
            setTimeout(function () {
                triggerChartResize();
            }, 0);
        });

        // On window resize
        var resizeCharts;
        window.onresize = function () {
            clearTimeout(resizeCharts);
            resizeCharts = setTimeout(function () {
                triggerChartResize();
            }, 200);
        };
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _barsTornadosExamples();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    EchartsBarsTornados.init();
});
