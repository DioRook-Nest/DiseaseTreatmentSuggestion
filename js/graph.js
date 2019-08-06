function callgraph(data, label) {
    //var data=data;
    var arr = ['cb-Set1', 'tol-rainbow'];
    l = label.length;
    var color = palette(arr, l);
    console.log(color);
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        responsive: true,
        type: 'doughnut',
        data: {
            labels: label,
            datasets: [{
                label: label,
                data: data,
                backgroundColor: color.map(function (hex) {
                    return '#' + hex;
                }),

                borderWidth: 1
            }]
        },
        options: {
            tooltip: " <%=label%>: <%= numeral(value).format('($00[.]00)') %> - <%= numeral(circumference / 6.283).format('(0[.][00]%)') %>",
            //animation.animateRotate: true
            responsive: true,
            legend: {
                position: 'bottom',
            },
            title: {
                display: false,
                text: 'Symptom Contribution'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            },
            tooltips: {
                
                    label: function (tooltipItem, data) {
                        var dataset = data.datasets[tooltipItem.datasetIndex];
                        var meta = dataset._meta[Object.keys(dataset._meta)[0]];
                        var total = meta.total;
                        var currentValue = dataset.data[tooltipItem.index];
                        var percentage = parseFloat((currentValue / total * 100).toFixed(1));
                        console.log(currentValue + ' (' + percentage + '%)')
                        return currentValue + ' (' + percentage + '%)';
                    },
                    title: function (tooltipItem, data) {
                        return data.label[tooltipItem[0].index];
                    }
                
            }
        }
    });
}