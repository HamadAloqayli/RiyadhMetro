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

$totalTickets = 0;
$totalCustomers = 0;

if(mysqli_num_rows($result_tickets) > 0)
{
    while($row = mysqli_fetch_array($result_tickets))
    {
         $date = $row['date'];

         $count = $row['COUNT(*)'];

         $totalTickets += $count;

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

         $totalCustomers += $count;

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

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Statistics - page</title>
  <meta name="keywords" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.">
  <meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.">
  
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/flat-icon/flaticon.css">
  <link rel="stylesheet" href="temp/styles/styles.css?ts=<?=time()?>">
  <link rel="stylesheet" href="temp/styles/myStyles.css?ts=<?=time()?>">
  <style>
 
 #Number_of_tickets, #Number_of_customers
 {
  width: 1000px; 
  height: 500px;
 }

 @media (max-width: 575.98px) {
   

  
 }

  </style>

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
          ['<?php echo $today ?>', <?php echo $todayTickets ?>]
        ]);

        var options = {
          chart: {
            title: 'Statistics about tickets',
            subtitle: 'Number of sold tickets: Last Week',
            },
            colors: ['#6bbf43'],
        };

        var chart = new google.charts.Bar(document.getElementById('Number_of_tickets'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

      function drawChart1() {                                                    // Number of customers
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Number of Registered Customers'],
          ['<?php echo $sixDay_before ?>', <?php echo $sixDayCustomers ?>],
          ['<?php echo $fiveDay_before ?>', <?php echo $fiveDayCustomers ?>],
          ['<?php echo $fourDay_before ?>', <?php echo $fourDayCustomers ?>],
          ['<?php echo $threeDay_before ?>', <?php echo $threeDayCustomers ?>],
          ['<?php echo $twoDay_before ?>', <?php echo $twoDayCustomers ?>],
          ['<?php echo $oneDay_before ?>', <?php echo $oneDayCustomers ?>],
          ['<?php echo $today ?>', <?php echo $todayCustomers ?>]
        ]);

        var options = {
          chart: {
            title: 'Statistics about customers',
            subtitle: 'Number of registered customers: Last Week',
          },
          colors: ['#6bbf43'],

        };

        var chart = new google.charts.Bar(document.getElementById('Number_of_customers'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
</head>
<body>
  <div class="main-wrapper">
  <header class="header header--bg">
      <div class="container">
        <nav class="navbar">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span> 
            </button>
            <a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav pull-right">
              <li><a href="Home.php">HOME</a></li>
              <li><a href="About.php">ABOUT</a></li>
              <li><a href="http://riyadhmetro.sa/en/interactive-map" target="_blank">INTERACTIVE MAP</a></li> 
              <?php
                      if(isset($_SESSION['id']))
                      {
                        echo '<li><a href="Dashboard.php">DASHBOARD</a></li>';
                        echo '<li><a href="checkAccount.php">SIGN OUT</a></li>';
                      }
                      else
                        echo '<li><a href="Register.php">SIGN IN</a></li>';


            ?>
            </ul>
          </div>
        </nav>
        <div class="header__content text-center">
          <h1 class="header__content__title">RIYADH METRO</h1>
          <p class="header__content__paragraph">Metro in the region that will make your life easier, closer, and more connected with the world around you, through the metro network that covers the city of Riyadh according to multiple networks and levels of transportation systems</p>
        </div>
      </div>
    </header>

      <div class="container" style="margin-top: 100px">
        <section class="price">
          <div class="page-section page-section--small">
            <h2 class="page-section__title text-center">About Statistics</h2>
      <br><br>
      <div class="price__panel-wrapper">
<br>
<div id="ticketsChart">
        <p>Number of Sold Tickets</p>
        <p>In the chart below it shows the number of sold tickets during the last week dynamically, based on the database</p>
        <p>Total Tickets: <?php echo $totalTickets ?></p>
        <div class="table-responsive">
          <div id="Number_of_tickets"></div>
        </div>
</div>

<br>
<hr>
<br>

<div id="customerChart">
      <p>Number of Registered Customers</p>
      <p>In the chart below it shows the number of registered customers during the last week dynamically, based on the database</p>
      <p>Total Customers: <?php echo $totalCustomers ?></p>
      <div class="table-responsive">
        <div id="Number_of_customers"></div>
      </div>
</div>


            </div>
          </div>
        </section>
      </div>
                
      <footer class="footer footer--bg">
        <div class="container">
          <div class="page-section">
            <div class="row gutters-100">
            <div class="col-md-3 col-lg-2">

</div>
              <div class="col-md-4 col-lg-3">
                <div class="footer__first">
                  <h2 class="footer__title">Riyadh Metro</h2>
                  <p class="footer-first__paragraph">We try to provide our services with the best possible quality and we thank you for your trust</p>
                  <ul class="footer-first__social-icons">
                    <li><a href="#"><i class="flaticon-facebook-letter-logo"></i></a></li>
                    <li><a href="#"><i class="flaticon-twitter-logo"></i></a></li>
                    <li><a href="#"><i class="flaticon-dribbble-logo"></i></a></li>
                    <li><a href="#"><i class="flaticon-behance-logo"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6 col-lg-2">
                <div class="footer__second">
                  <h2 class="footer__title">QUICK LINK</h2>
                  <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">INTERACTIVE MAP</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="footer__third">
                  <h2 class="footer__title">CONTACT US</h2>
                  <ul>
                    <li><span class="glyphicon glyphicon-envelope"></span> <a href="#">riyadhmetro@ksa.com</a></li>
                    <li><span class="glyphicon glyphicon-earphone"></span> <a href="#">9200200002</a></li>
                  </ul>
                  <h4 class="footer__subscribe__title">Subscribe</h4>
                  <div class="subscribe-section">
                    <input type="email" class="form-control" size="50" placeholder="Enter Your Email" required>
                    <button class="subscribe-section__button" type="button"><img src="assets/images/send-icon.png" alt=""></button>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-lg-2">

              </div>
            </div>
            <hr class="footer__horizontal-bar">
            <p class="footer__bottom-paragraph">&copy; Copyright 2020 <a href="#" style="color: #ffffff;font-weight:bold;">SWE497 students</a>. All Rights Reserved</p>
          </div>
        </div>
      </footer>
  </div>
    
  <script>(function(){var pp=document.createElement('script'), ppr=document.getElementsByTagName('script')[0]; stid='T0ZWZ0NTSFF4ZkFSbkFmS0dvRXk5QT09';pp.type='text/javascript'; pp.async=true; pp.src=('https:' == document.location.protocol ? 'https://' : 'http://') + 's01.live2support.com/dashboardv2/chatwindow/'; ppr.parentNode.insertBefore(pp, ppr);})();</script>  

  <script src="assets/jquery/jquery-3.2.1.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="temp/script/script.js?ts=<?=time()?>"></script>
  <script>
      var card = document.querySelector('.card');
        card.addEventListener( 'click', function() {
        card.classList.toggle('is-flipped');
        });
  </script>
</body>
</html>