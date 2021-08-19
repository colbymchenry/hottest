<script>

   
    // SUBSCRIPTIONS CHART - JS Chart
    $(function () {
    "use strict";

    var ctx = document.getElementById('subscriptions_chart').getContext('2d');

    var stackedBar = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
            datasets: [{
                label: "VIP Orders",
                data: [7, 6, 5, 2, 8, 10, 12],
                backgroundColor: '#626bcc',
                borderColor: '#626bcc',
                pointBorderColor: '#ffffff',
                pointBackgroundColor: '#626bcc',
                hoverBackgroundColor: '#535aac',
                pointBorderWidth: 6,
                pointRadius: 4

            } , {
                label: "Messages Orders",
                type: 'bar',  // override the default type
                data: [13, 12, 10, 3, 15, 20, 25],
                backgroundColor: 'rgba(255,255,255,0.75)',
                borderColor: '#fff',
                pointBorderColor: '#ffffff',
                pointBackgroundColor: '#fff',
                pointBorderWidth: 6,
                pointRadius: 4
            }, {
                label: "Snapchart",
                type: 'bar',  // override the default type
                data: [5, 3, 4, 6, 5, 3, 4],
                backgroundColor: 'rgba(255,255,255,0.25)',
                borderColor: 'rgba(255,255,255,0.5)',
                pointBorderColor: 'rgba(255,255,255,0.5)',
                pointBackgroundColor: '#fff',
                pointBorderWidth: 6,
                pointRadius: 4,
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
                    display: false,
                    barThickness : 20,
                    stacked: true

                }],
                yAxes: [{
                    display: false,
                    stacked: true
                }]

            },
            elements: {
                line: {
                    tension: 0.00001,
                    //  tension: 0.4,
                    borderWidth: 1
                },
                point: {
                    radius: 2,
                    hitRadius: 10,
                    hoverRadius: 6,
                    borderWidth: 4
                }
            }
        }
    });

});
</script>