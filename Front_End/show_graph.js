var readData = {time: ['Time', '5:00', '6:00', '7:00'],
                temp: ['Temperature', 21, 23, 22],
                humidity: ['Humidity', 100, 120, 130]};

google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart)

function getData() {
    var req = new XMLHttpRequest();
    req.open("Get", "Get_Data.php", false);
    req.send(null);
}

function buildData(read) {
    var newData = [];
    for (i = 0; i < 4; i++) {
        newData.push([read.time[i], read.temp[i], read.humidity[i]]);
    }
    return newData;
}

function drawChart() {
    var dataTable = buildData(readData);
    var data = google.visualization.arrayToDataTable(dataTable);

    var options = {
        title: 'Sensor Data'
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}

console.log(buildData(readData));
drawChart();
