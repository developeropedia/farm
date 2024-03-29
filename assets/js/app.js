// ==================data table
    $(document).ready( function () {
        $('#dashboard-table').DataTable({
            scrollX: true,
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>t<'row'<'col-sm-6'i><'col-sm-6'p>><'row'<'col-sm-12'B>>",
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Excel Export',
                    init: function (api, node, config) {
                        // Hide the button if isAdminTable is false
                        $(node).css('display', showExcel ? 'block' : 'none');
                    }
                }
            ]
        });
    } );    
//    Charrts 1
var xValues = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
var yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

new Chart("myChart", {
    type: "horizontalBar",
    data: {
        labels: xValues,
        datasets: [{
            fill: false,
            lineTension: 0,
            backgroundColor: "#7367f0",
            borderColor: "#7367f0",
            data: yValues
        }]
    },
    options: {
        legend: { display: false },
        scales: {
            yAxes: [{
                ticks: { min: 6, max: 16 },
                indexAxis: 'y'
            }],
        }
    }
});
//   chart 2
var xValues = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
var yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

new Chart("myChart2", {
    type: "line",
    data: {
        labels: xValues,
        datasets: [{
            fill: false,
            lineTension: 0,
            backgroundColor: "#7367f0",
            borderColor: "rgba(0,0,255,0.1)",
            data: yValues
        }]
    },
    options: {
        legend: { display: false },
        scales: {
            yAxes: [{
                ticks: { min: 6, max: 16 },
                indexAxis: 'y'
            }],
        }
    }
});

$(".bi-trash").on("click", function (e) {
    e.preventDefault()
    if(confirm("Are you sure you want to delete this?")) {
        location.href = $(this).closest("a").attr("href")
    } else {
        return false;
    }
})