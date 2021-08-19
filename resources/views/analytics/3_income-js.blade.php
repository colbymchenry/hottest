<script>
// chartjs initialization

$(function () {
    "use strict";

// orders_chart-js

    var ctx = document.getElementById('orders_chart-js').getContext('2d');

    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["Mon", "Tues", "Wed", "Thu", "Fri", "Sat", "Sun"],
            datasets: [{
                label: "Orders",
                backgroundColor: 'rgba(251,146,140,.15)',
                borderColor: '#fb928c',
                pointBackgroundColor: "#ffffff",
                data: [100, 90, 250, 180, 300, 200, 400]
            }]
        },

        // Configuration options go here
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false
            },

            scales: {
                xAxes: [{
                    display: false
                }],
                yAxes: [{
                    display: false,
                    gridLines: {
                        zeroLineColor: '#e7ecf0',
                        color: '#e7ecf0',
                        borderDash: [5,5,5],
                        zeroLineBorderDash: [5,5,5],
                        drawBorder: false
                    }
                }]

            },
            elements: {
                line: {
                    tension: 0.00001,
              //tension: 0.4,
                    borderWidth: 1
                },
                point: {
                    radius: 2,
                    hitRadius: 10,
                    hoverRadius: 6,
                    borderWidth: 2
                }
            }
        }
    });



// expenses_chart-js

    var ctx = document.getElementById('expenses_chart-js').getContext('2d');

    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["Mon", "Tues", "Wed", "Thu", "Fri", "Sat", "Sun"],
            datasets: [{
                label: "Expenses",
                backgroundColor: 'rgba(236,209,164,.15)',
                borderColor: '#ecd1a4',
                pointBackgroundColor: "#ffffff",
                data: [70, 60, 190, 150, 230, 140, 290]
            }]
        },

        // Configuration options go here
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false
            },

            scales: {
                xAxes: [{
                    display: false
                }],
                yAxes: [{
                    display: false,
                    gridLines: {
                        zeroLineColor: '#e7ecf0',
                        color: '#e7ecf0',
                        borderDash: [5,5,5],
                        zeroLineBorderDash: [5,5,5],
                        drawBorder: false
                    }
                }]

            },
            elements: {
                line: {
                    tension: 0.00001,
                    //tension: 0.4,
                    borderWidth: 1
                },
                point: {
                    radius: 2,
                    hitRadius: 10,
                    hoverRadius: 6,
                    borderWidth: 2
                }
            }
        }
    });

// state_profit_chart

    var ctx = document.getElementById('profit_chart-js').getContext('2d');

    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["Mon", "Tues", "Wed", "Thu", "Fri", "Sat", "Sun"],
            datasets: [{
                label: "Profit",
                backgroundColor: 'rgba(147,159,255,.15)',
                borderColor: '#939fff',
                pointBackgroundColor: "#ffffff",
                data: [40, 30, 60, 80, 100, 80, 140]
            }]
        },

        // Configuration options go here
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false
            },

            scales: {
                xAxes: [{
                    display: false
                }],
                yAxes: [{
                    display: false,
                    gridLines: {
                        zeroLineColor: '#e7ecf0',
                        color: '#e7ecf0',
                        borderDash: [5,5,5],
                        zeroLineBorderDash: [5,5,5],
                        drawBorder: false
                    }
                }]

            },
            elements: {
                line: {
                    tension: 0.00001,
                    //tension: 0.4,
                    borderWidth: 1
                },
                point: {
                    radius: 2,
                    hitRadius: 10,
                    hoverRadius: 6,
                    borderWidth: 2
                }
            }
        }
    });

});
</script>