<script>

// chartjs initialization

$(function () {
    "use strict";


// doughnut_chart

    var ctx = document.getElementById("doughnut_chart");
    var data = {
        labels: [
            "Public", "VIP", "Unlisted"
        ],
        datasets: [{
            data: [25, 30, 45],
            backgroundColor: [
                "#cae59b",
                "#f79490",
                "#acf5fe"              
            ],
            borderWidth: [
                "0px",
                "0px",
                "0px"
            ],
            borderColor: [
                "#cae59b",
                "#f79490",
                "#acf5fe"   
            ]
        }]
    };

    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: {
            legend: {
                display: false
            }
        }
    });


});


// chartjs initialization

$(function () {
    "use strict";


    // doughnut_chart

    var ctx = document.getElementById("doughnut_chart2");
    var data = {
        labels: [
            "Public", "VIP", "Unlisted"
        ],
        datasets: [{
            data: [30, 50, 45],
            backgroundColor: [
                "#cae59b",
                "#f79490",
                "#acf5fe"              
            ],
            borderWidth: [
                "0px",
                "0px",
                "0px"
            ],
            borderColor: [
                "#cae59b",
                "#f79490",
                "#acf5fe"   
            ]
        }]
    };

    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: {
            legend: {
                display: false
            }
        }
    });


});



</script>