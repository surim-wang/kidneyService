<?php
$conn = mysqli_connect("127.0.0.1", "root", "123456");
$db = mysqli_select_db($conn, 'opentutorials');
$InspectName = $_POST['draw'];
$query = "SELECT * FROM `medicalrecords` WHERE InspectName = '$InspectName'";
$result = mysqli_query($conn, $query);
?>


<html lang = "en">
  <head>
    <meta charset='utf-8'>
    <title>Chart</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      //\google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Result', 'MinRefValue', 'MaxRefValue'],
          <?php
              if(mysqli_num_rows($result)>0){
                  while($row= mysqli_fetch_array($result)){
                     //var_dump(.'"$row['Date']"'.);
                     //var_dump($row['Date']);
                      echo "['".$row['Date']."', '".$row['Result']."', '".$row['MinRefValue']."', '".$row['MaxRefValue']."'],";
                  }
              }
          ?>
         ]);
        var options = {
          chart: {
            title:  'titleInspect',
            subtitle: 'sub title',
            }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
        //var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
        //chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 1350px; height: 700px;"></div>
    <!--<div id="curve_chart" style="width: 800px; height: 500px;"></div>-->
  </body>
</html>
