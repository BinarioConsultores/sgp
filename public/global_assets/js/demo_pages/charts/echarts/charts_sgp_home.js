/* ------------------------------------------------------------------------------
 *
 *  # Echarts - Column and Waterfall charts
 *
 *  Demo JS code for echarts_columns_waterfalls.html page
 *
 * ---------------------------------------------------------------------------- */
var miJson = {

    // Define colors
    color: ['#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80'],

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
       right: 40,
       top: 35,
       bottom: 0,
       containLabel: true
    },

    // Add legend
    legend: {
       data: ['PRESUPUESTO TOTAL', 'PRESUPUESTO UTILIZADO'],
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
       }
    },

    // Horizontal axis
    xAxis: [{
       type: 'category',
       data: ['PRESUPUESTO TOTAL VS. PRESUPUESTO UTILIZADO'],
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
    }
   ],

    // Vertical axis
    yAxis: [{
       type: 'value',
       axisLabel: {
          color: '#333'
       },
       axisLine: {
          lineStyle: {
                color: '#999'
          }
       },
       splitLine: {
          lineStyle: {
                color: ['#eee']
          }
       },
       splitArea: {
          show: true,
          areaStyle: {
                color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.01)']
          }
       }
    }],

    // Add series
    series: [
       {
          name:'PRESUPUESTO TOTAL',
          type: 'bar',
          data: [total],
          itemStyle: {
                normal: {
                   label: {
                      show: true,
                      position: 'top',
                      textStyle: {
                            fontWeight: 500
                      }
                   }
                }
          },
          markLine: {
                data: [{type: 'average', name: 'Average'}]
          }
       },
       {
         name:'PRESUPUESTO UTILIZADO',
         type: 'bar',
         data: [utilizado],
         itemStyle: {
               normal: {
                  label: {
                     show: true,
                     position: 'top',
                     textStyle: {
                           fontWeight: 500
                     }
                  }
               }
         },
         markLine: {
               data: [{type: 'average', name: 'Average'}]
         }
      }
    ]
    };


    
// Setup module
// ------------------------------

var EchartsColumnsWaterfalls = function() {


    //
    // Setup module components
    //

    // Column and waterfall charts
    var _columnsWaterfallsExamples = function() {
        if (typeof echarts == 'undefined') {    
            console.warn('Warning - echarts.min.js is not loaded.');
            return;
        }

        // Define elements
        var columns_basic_element = document.getElementById('columns_basic');
        // Charts configuration
        //

        // Basic columns chart
        if (columns_basic_element) {

            // Initialize chart
            var columns_basic = echarts.init(columns_basic_element);


            //
            // Chart config
            //

            // Options
            // columns_basic.setOption();

            columns_basic.setOption(miJson);
        }
        //
        // Resize charts
        //

        // Resize function
        var triggerChartResize = function() {
            columns_basic_element && columns_basic.resize();
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
            _columnsWaterfallsExamples();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    EchartsColumnsWaterfalls.init();
});
