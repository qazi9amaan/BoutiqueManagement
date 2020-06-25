// AJAX CALL TO GET CUTOMERS AND THE ORDERS PERDAY 
function show_customers(data) {
    var optionsSpark3 = {
        series: [{
            data: data,
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
            text: data.reduce((a, b) => a + b, 0),
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
}

function show_orders(data) {


    var chart_orders = {
        series: [{
            data: data,
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
            text: data.reduce((a, b) => a + b, 0),
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
    var chart_orders = new ApexCharts(document.querySelector(".chart-sparkline-orders"), chart_orders);
    chart_orders.render();

}
$(document).ready(function() {
    jQuery.ajax({
        url: "/users/admin/includes/charts/get-chart-details.php",
        type: "GET",
        data: 'get-all-customers=true',
        success: function(data) {
            show_customers(data);
        },
        dataType: "json"
    });
    jQuery.ajax({
        url: "/users/admin/includes/charts/get-chart-details.php",
        type: "GET",
        data: 'get-all-orders=true',
        success: function(data) {
            console.log(data);
            show_orders(data);
        },
        dataType: "json"
    });

});