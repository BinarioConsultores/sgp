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
       data: ['PRESUPUESTO UTILIZADO (S/.)','PRESUPUESTO TOTAL (S/.)'],
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
       data: ['PRESUPUESTO UTILIZADO VS. PRESUPUESTO TOTAL'],
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
          name:'PRESUPUESTO UTILIZADO (S/.)',
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
       },
       {
         name:'PRESUPUESTO TOTAL (S/.)',
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
      }
    ]
    };

var JsonChart2 = { // Define colors
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
       data: ['PRESUPUESTO UTILIZADO (S/.)','PRESUPUESTO TOTAL (S/.)'],
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
       data: jsonEtapas,
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
          name:'PRESUPUESTO UTILIZADO (S/.)',
          type: 'bar',
          data: arrEtapasUtilizado,
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
         name:'PRESUPUESTO TOTAL (S/.)',
         type: 'bar',
         data: arrEtapasTotal,
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
    ]};


    var JsonChart3 = { // Define colors
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
         data: ['PRESUPUESTO UTILIZADO (S/.)','PRESUPUESTO TOTAL (S/.)'],
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
         data: arrCategorias,
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
            name:'PRESUPUESTO UTILIZADO (S/.)',
            type: 'bar',
            data: arrCateUtil,
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
           name:'PRESUPUESTO TOTAL (S/.)',
           type: 'bar',
           data: arrCateTotal,
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
      ]};
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
        var columns_basic_element2 = document.getElementById('columns_basic2');
        var columns_basic_element3 = document.getElementById('columns_basic3');
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
        if (columns_basic_element2) {

            // Initialize chart
            var columns_basic2 = echarts.init(columns_basic_element2);


            //
            // Chart config
            //

            // Options
            // columns_basic.setOption();

            columns_basic2.setOption(JsonChart2);
        }
        if (columns_basic_element3) {

            // Initialize chart
            var columns_basic3 = echarts.init(columns_basic_element3);


            //
            // Chart config
            //

            // Options
            // columns_basic.setOption();

            columns_basic3.setOption(JsonChart3);
        }


        //
        // Resize charts
        //

        // Resize function
        var triggerChartResize = function() {
            columns_basic_element && columns_basic.resize();
            columns_basic_element2 && columns_basic2.resize();
            columns_basic_element3 && columns_basic3.resize();
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
