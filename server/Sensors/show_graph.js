google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(getData);

function getData() {
    $.getJSON("dataSending.php", function(data) {
        drawChart(data);
    });
}

function convertData(read) {
    var newData = [];
    newData.push(["Date", "Humidity"]);
    for (i = 0; i < 2; i++) {
        console.log(read.times[i], " ", read.humidity[i]);
        newData.push([read.times[i], read.humidity[i]]);
    }
    return newData;
}

function drawChart(jsonData) {
    var arrayData = convertData(jsonData);
    var chartData = google.visualization.arrayToDataTable(arrayData);

    var options = {
        title: 'Sensor Data'
    };

    var chart = new google.visualization.LineChart($("#chart_div").get(0));
    chart.draw(chartData, options);
}
