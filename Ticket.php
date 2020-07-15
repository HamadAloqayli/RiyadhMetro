<?php

session_start();

if(isset($_SESSION['numPaths']))
{

  $_SESSION['numPaths'] = "";
  $_SESSION['class'] = "";
  $_SESSION['price'] = "";
  $_SESSION['numTickets'] = "";
  $_SESSION['status'] = 0;

  if(isset($_SESSION['path1']))
  {
    $_SESSION['path1'] = "";
    $_SESSION['from1'] = "";
    $_SESSION['to1'] = "";
  }
  if(isset($_SESSION['path2']))
  {
    $_SESSION['path2'] = "";
    $_SESSION['from2'] = "";
    $_SESSION['to2'] = "";
  }
  if(isset($_SESSION['path3']))
  {
    $_SESSION['path3'] = "";
    $_SESSION['from3'] = "";
    $_SESSION['to3'] = "";
  }
  if(isset($_SESSION['path4']))
  {
    $_SESSION['path4'] = "";
    $_SESSION['from4'] = "";
    $_SESSION['to4'] = "";
  }
  if(isset($_SESSION['path5']))
  {
    $_SESSION['path5'] = "";
    $_SESSION['from5'] = "";
    $_SESSION['to5'] = "";
  }
  if(isset($_SESSION['path6']))
  {
    $_SESSION['path6'] = "";
    $_SESSION['from6'] = "";
    $_SESSION['to6'] = "";
  }

}

if(isset($_SESSION['type']))
{
  $_SESSION['type'] = "";
  $_SESSION['statusC'] = 0;
}

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Ticket - page</title>
  <meta name="keywords" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.">
  <meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.">
  
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/flat-icon/flaticon.css">
  <link rel="stylesheet" href="temp/styles/styles.css?ts=<?=time()?>">
  <link rel="stylesheet" href="temp/styles/myStyles.css?ts=<?=time()?>">
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
          <div class="page-section page-section--small text-center">
            <h2 class="page-section__title">TYPES OF TICKETS</h2>
            <p class="page-section__paragraph">Get tickets online now without having to go to the ticket centers, to save time and effort</p>
            <div class="price__panel-wrapper">
              <div class="row gutters-50" style="margin-top: 30px;">
                <div class="col-md-4 col-md-offset-2">
                  <div class="panel text-center">
                    <div class="panel-heading">
                      <h4 class="price__title">Single Trip</h4>
                    </div>
                    <br>
                    <div>
                      <a class="panel__button" href="SingleTrip.php">GET THIS TICKET</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="panel text-center">
                    <div class="panel-heading">
                      <h4 class="price__title">Daily Pass</h4>
                    </div>
                    <br>
                    <div>
                      <a class="panel__button" href="DailyPass.php">GET THIS TICKET</a>
                    </div>
                  </div>
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
</body>
</html>





