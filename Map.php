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
  <title>Map - page</title>
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
    
    <section class="about map" style="margin-top: 100px;">
      <div class="container">
        <div class="page-section" style="margin-bottom: 100x;">
          <div class="text-center">
            <h2 class="page-section__title">METRO MAP DETAILS</h2>
            <p class="page-section__paragraph">A metro map that clarify users to know and understand the metro network in addition to the stations and paths used for transportation</p>
          </div>
          <a href="img/map.jpg" target="_blank">
                    <img src="img/map.jpg" alt="">
          </a>
          </div>
        </div>
      </section>
                
      <section class="about">
      <div class="container">
        <div class="page-section">
          <div class="text-center">
          </div>
          <div class="row gutters-50">
            <div class="about--narrow">
              <div class="col-md-6">
                <a href="img/L1-map.jpg" target="_blank">
                  <img class="img-responsive" src="img/L1-map.jpg" alt="">
                </a>
              </div>
              <div class="col-md-6 about__extra-padding">
                <h3 class="about__content-title" style="color: #1da4dc">Blue Path</h3>
                <p class="about__content-subTitle">Olaya - Al Batha axis, the path length is 38 km.</p>
                  <p class="about__content-paragraph">The path includes the implementation of a number of special works, most notably:</p>
                  <p><ul class="about__content-paragraph">
                    <li>Implementation of deep tunnels (25-40 meters) deep underground on Olaya Street and King Faisal for a length of 17.3 km using the tunnel boring technique</li>
                    <li>Implementation of two main stations: Olaya Station, King Abdullah Financial Center Station</li>
                    <li>Implementation of a passenger transfer station at the King Abdulaziz Historical Center (when it meets the green path on King Abdulaziz Road)</li>
                    <li>Construction of 3 public parking buildings, P&R, each with a capacity of 600 parking spaces</li>
                    <li>Implementation of two housing and maintenance centers, with a total area of (227 thousand) square meters</li>
                  </ul></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="about">
      <div class="container">
        <div class="page-section">
          <div class="text-center">
          </div>
          <div class="row gutters-50">
            <div class="about--narrow">
              <div class="col-md-6">
                <a href="img/L2-map.jpg" target="_blank">
                  <img class="img-responsive" src="img/L2-map.jpg" alt="">
                </a>
              </div>
              <div class="col-md-6 about__extra-padding">
                <h3 class="about__content-title" style="color: #d71e48">Red Path</h3>
                <p class="about__content-subTitle">King Abdullah Road axis, the path length is 25.3 km.</p>
                  <p class="about__content-paragraph">The path includes the implementation of a number of special works, most notably:</p>
                  <p><ul class="about__content-paragraph">
                    <li>Implementation of passenger stations to serve the main activities areas of King Saud University, King Salman Science Oasis, Riyadh International Convention and Exhibition Center, King Salman Social Center, King Fahd International Stadium, the educational district that includes both (the headquarters of the Ministry of Education, Prince Sultan University, College Technology)</li>
                    <li>Construction of two public parking buildings (P&R), each with a capacity of 600 parking spaces</li>
                    <li>Implementation of a housing and maintenance center near King Fahd Stadium, with a total area of 122 thousand square meters</li>
                  </ul></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="about">
      <div class="container">
        <div class="page-section">
          <div class="text-center">
          </div>
          <div class="row gutters-50">
            <div class="about--narrow">
              <div class="col-md-6">
                <a href="img/L3-map.jpg" target="_blank">
                  <img class="img-responsive" src="img/L3-map.jpg" alt="">
                </a>
              </div>
              <div class="col-md-6 about__extra-padding">
                <h3 class="about__content-title" style="color: #f68026">Orange Path</h3>
                <p class="about__content-subTitle">Al-Madinah Al-Munawwarah Road - Saad bin Abdul Rahman Al-Awal axis, the path length is 40.7 km.</p>
                  <p class="about__content-paragraph">The path includes the implementation of a number of special works, most notably:</p>
                  <p><ul class="about__content-paragraph">
                    <li>Implementation of two main stations at each of: Qasr Al-Hakam near the Eid prayer hall, the western station at the vegetable market in western Riyadh</li>
                    <li>Implementation of deep tunnels (25-40 meters) deep underground in the downtown districts of Riyadh for a length of 9.4 km, using the tunnel boring technique.</li>
                    <li>Construction of 6 public parking buildings, P&R, each with a capacity of 600 stops</li>
                    <li>Implementation of two housing and maintenance centers in each of the Tuwaiq neighborhood, west of Riyadh, and the eastern Naseem neighborhood, east of Riyadh, with a total area of (204 thousand) square meters</li>
                  </ul></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="about">
      <div class="container">
        <div class="page-section">
          <div class="text-center">
          </div>
          <div class="row gutters-50">
            <div class="about--narrow">
              <div class="col-md-6">
                <a href="img/L4-map.jpg" target="_blank">
                  <img class="img-responsive" src="img/L4-map.jpg" alt="">
                </a>
              </div>
              <div class="col-md-6 about__extra-padding">
                <h3 class="about__content-title" style="color: #faee1c">Yellow Path</h3>
                <p class="about__content-subTitle">King Khalid International Airport Road axis, the path length is 29.6 km.</p>
                  <p class="about__content-paragraph">The path includes the implementation of a number of special works, most notably:</p>
                  <p><ul class="about__content-paragraph">
                    <li>Converting 132 kV high pressure tower lines on Prince Saud bin Muhammad bin Muqrin Road to underground lines with a length of 15 km</li>
                    <li>Implementation of 3 underground stations to serve the passenger lounges at King Khalid International Airport</li>
                    <li>Implementation of passenger stations Implementation of passenger stations to serve the main activities areas of each of Imam Muhammad bin Saud Islamic University, Prince Nora Bint Abdul University, Rahman Girls, Complex of Government Departments, implementation of 3 buildings for public parking P&R each of them to 600 stops</li>
                    <li>Implementation of a joint housing and maintenance center for the fourth and sixth tracks, with a total area of (168 thousand) square meters</li>
                  </ul></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="about">
      <div class="container">
        <div class="page-section">
          <div class="text-center">
          </div>
          <div class="row gutters-50">
            <div class="about--narrow">
              <div class="col-md-6">
                <a href="img/L5-map.jpg" target="_blank">
                  <img class="img-responsive" src="img/L5-map.jpg" alt="">
                </a>
              </div>
              <div class="col-md-6 about__extra-padding">
                <h3 class="about__content-title" style="color: #6db547">Green Path</h3>
                <p class="about__content-subTitle">King Abdulaziz Road axis, the path length is 12.9 km.</p>
                  <p class="about__content-paragraph">The path includes the implementation of a number of special works, most notably:</p>
                  <p><ul class="about__content-paragraph">
                    <li>Implementation of deep tunnels (25-40 meters) underground using the Tunnel Boring Technique 12.9 km</li>
                    <li>Implementation of underground passenger terminals to serve ministries and government departments along the King Abdulaziz Road.</li>
                    <li>Implementation of an underground housing and maintenance center near the Ministry of Education, with a total area of (50 thousand) square meters.</li>
                  </ul></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="about">
      <div class="container">
        <div class="page-section" style="margin-bottom: 100x;">
          <div class="text-center">
          </div>
          <div class="row gutters-50">
            <div class="about--narrow">
              <div class="col-md-6">
                <a href="img/L6-map.jpg" target="_blank">
                  <img class="img-responsive" src="img/L6-map.jpg" alt="">
                </a>
              </div>
              <div class="col-md-6 about__extra-padding">
                <h3 class="about__content-title" style="color: #a2258d">Purple Path</h3>
                <p class="about__content-subTitle">Abdul Rahman bin Auf Road - Sheikh Hassan bin Hussein bin Ali Road axis, the path length is 30 km.</p>
                  <p class="about__content-paragraph">The path includes the implementation of a number of special works, most notably:</p>
                  <p><ul class="about__content-paragraph">
                    <li>Abdul Rahman bin Auf Street, Sheikh Hassan bin Hussein bin Ali Street and Abu Jaafar Al Mansour Street with a total length of 17 km</li>
                    <li>Implementation of ten stations, five of which are transfer stations</li>
                    <li>Construction of 3 public parking buildings, P&R, each with a capacity of 600 parking spaces.</li>
                  </ul></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


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





