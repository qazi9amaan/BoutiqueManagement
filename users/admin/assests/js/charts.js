window.onload = function() {


    // AJAX CALL TO GET CUTOMERS AND THE ORDERS PERDAY 

    var optionsSpark3 = {
        series: [{
            data: [1, 1, 2, 3, 4, 5, 67, 7, 8, 9],
            name: "Customers",
        }],
        chart: {
            type: 'area',
            height: 160,
            sparkline: {
                enabled: true
            },

        },
        stroke: {
            curve: 'straight',
            colors: ['#528165'],
        },
        fill: {
            opacity: 0.3,
            colors: ['#528165'],
        },
        xaxis: {
            crosshairs: {
                width: 1
            },
        },
        yaxis: {
            min: 0
        },
        title: {
            text: '10',
            offsetX: 0,
            style: {
                fontSize: '24px',
                color: '#528165 ',

            }
        },
        subtitle: {
            text: 'Customers',
            offsetX: 0,
            style: {
                fontSize: '14px',
                color: '#528165',
            }
        }
    };

    var chartSpark3 = new ApexCharts(document.querySelector("#chart-sparkline-customers"), optionsSpark3);
    chartSpark3.render();

    var chart_orders = {
        series: [{
            data: [1, 1, 2, 3, 4, 5, 67, 7, 8, 9],
            name: "Orders",
        }],
        chart: {
            type: 'area',
            height: 160,
            sparkline: {
                enabled: true
            },

        },
        stroke: {
            curve: 'straight',
            colors: ['#3298dc'],
        },
        fill: {
            opacity: 0.3,
            colors: ['#3298dc'],
        },
        xaxis: {
            crosshairs: {
                width: 1
            },
        },
        yaxis: {
            min: 0
        },
        title: {
            text: '0',
            offsetX: 0,
            style: {
                fontSize: '24px',
                color: '#3298dc',

            }
        },
        subtitle: {
            text: 'Orders',
            offsetX: 0,
            style: {
                fontSize: '14px',
                color: '#3298dc',
            }
        }
    };

    var chart_orders = new ApexCharts(document.querySelector("#chart-sparkline-orders"), chart_orders);
    chart_orders.render();
}