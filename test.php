<?php

session_start();

include "database.php";

date_default_timezone_set('Asia/Riyadh');

$sql_tickets = " SELECT *,COUNT(*) FROM ticket GROUP BY date ORDER BY date DESC";
$sql_customers = " SELECT *,COUNT(*) FROM customer GROUP BY date ORDER BY date DESC";

$result_tickets = mysqli_query($con,$sql_tickets);
$result_customers = mysqli_query($con,$sql_customers);



$today = date("Y-m-d",strtotime("now"));
$oneDay_before = date("Y-m-d",strtotime("-1 day"));
$twoDay_before = date("Y-m-d",strtotime("-2 days"));
$threeDay_before = date("Y-m-d",strtotime("-3 days"));
$fourDay_before = date("Y-m-d",strtotime("-4 days"));
$fiveDay_before = date("Y-m-d",strtotime("-5 days"));
$sixDay_before = date("Y-m-d",strtotime("-6 days"));

$todayTickets = 0;
$oneDayTickets = 0;
$twoDayTickets = 0;
$threeDayTickets = 0;
$fourDayTickets = 0;
$fiveDayTickets = 0;
$sixDayTickets = 0;

$todayCustomers = 0;
$oneDayCustomers = 0;
$twoDayCustomers = 0;
$threeDayCustomers = 0;
$fourDayCustomers = 0;
$fiveDayCustomers = 0;
$sixDayCustomers = 0;


if(mysqli_num_rows($result_tickets) > 0)
{
    while($row = mysqli_fetch_array($result_tickets))
    {
         $date = $row['date'];

         $count = $row['COUNT(*)'];

        switch($date)
        {
            case $today:
            $todayTickets = $count;
            break;

            case $oneDay_before:
            $oneDayTickets = $count;
            break;

            case $twoDay_before:
            $twoDayTickets = $count;
            break;

            case $threeDay_before:
            $threeDayTickets = $count;
            break;

            case $fourDay_before:
            $fourDayTickets = $count;
            break;

            case $fiveDay_before:
            $fiveDayTickets = $count;
            break;

            case $sixDay_before:
            $sixDayTickets = $count;
            break;

            default:
            $defaultTickets = 0;
            break;
        }

    }
}

if(mysqli_num_rows($result_customers) > 0)
{
    while($row = mysqli_fetch_array($result_customers))
    {
         $date = $row['date'];

         $count = $row['COUNT(*)'];

        switch($date)
        {
            case $today:
            $todayCustomers = $count;
            break;

            case $oneDay_before:
            $oneDayCustomers = $count;
            break;

            case $twoDay_before:
            $twoDayCustomers = $count;
            break;

            case $threeDay_before:
            $threeDayCustomers = $count;
            break;

            case $fourDay_before:
            $fourDayCustomers = $count;
            break;

            case $fiveDay_before:
            $fiveDayCustomers = $count;
            break;

            case $sixDay_before:
            $sixDayCustomers = $count;
            break;

            default:
            $defaultCustomers = 0;
            break;
        }

    }
}

?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart() {                                                       // Number of tickets
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Number of Sold Tickets'],
          ['<?php echo $sixDay_before ?>', <?php echo $sixDayTickets ?>],
          ['<?php echo $fiveDay_before ?>', <?php echo $fiveDayTickets ?>],
          ['<?php echo $fourDay_before ?>', <?php echo $fourDayTickets ?>],
          ['<?php echo $threeDay_before ?>', <?php echo $threeDayTickets ?>],
          ['<?php echo $twoDay_before ?>', <?php echo $twoDayTickets ?>],
          ['<?php echo $oneDay_before ?>', <?php echo $oneDayTickets ?>],
          ['<?php echo $today ?>', '<?php echo $todayTickets ?>']
        ]);

        var options = {
          chart: {
            title: 'Statistics about tickets',
            subtitle: 'Number of tickets: Last Week',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('Number_of_tickets'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

      function drawChart1() {                                                    // Number of customers
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Number of Sold Tickets'],
          ['<?php echo $sixDay_before ?>', <?php echo $sixDayCustomers ?>],
          ['<?php echo $fiveDay_before ?>', <?php echo $fiveDayCustomers ?>],
          ['<?php echo $fourDay_before ?>', <?php echo $fourDayCustomers ?>],
          ['<?php echo $threeDay_before ?>', <?php echo $threeDayCustomers ?>],
          ['<?php echo $twoDay_before ?>', <?php echo $twoDayCustomers ?>],
          ['<?php echo $oneDay_before ?>', <?php echo $oneDayCustomers ?>],
          ['<?php echo $today ?>', '<?php echo $todayCustomers ?>']
        ]);

        var options = {
          chart: {
            title: 'Statistics about customers',
            subtitle: 'Number of customers: Last Week',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('Number_of_cutomers'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <style>

    </style>
  </head>
  <body>
    <div id="Number_of_tickets" style="width: 800px; height: 500px;"></div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div id="Number_of_cutomers" style="width: 800px; height: 500px;"></div>
  </body>
</html>
