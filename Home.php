<?php

session_start();

include "database.php";

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

$sqlNews = " SELECT * FROM news WHERE status = 1 ";

$resultNews = mysqli_query($con,$sqlNews);

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Home - page</title>
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
              <li><a href="#">HOME</a></li>
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
    
    <section class="service">
      <div class="container" style="margin-top: 100px">
        <div class="page-section text-center">
          <h2 class="page-section__title">SERVICES WE OFFER</h2>
          <p class="page-section__paragraph">Riyadh Metro project offers many services that facilitate movement in the metro network, so you can book tickets, get subscription cards, view the metro map and many other services all in your hands </p>
          <div class="row gutters-40">
            <div class="col-md-4">
<a href="Card.php">
                <div class="thumbnail">
                  <i class="material-icons"><img src="img/card.svg" alt=""></i>
                  <h4 class="service__title">Get a card</h4>
                  <p class="service__paragraph">A smart card that enables you to use the metro and enjoy more mobility with the card, as you can get a weekly, monthly, yearly card</p>
                </div>
</a>
            </div>
            <div class="col-md-4">
<a href="Map.php">
                <div class="thumbnail">
                  <i class="material-icons"><img src="img/map1.svg" alt=""></i>
                  <h4 class="service__title">View the map</h4>
                  <p class="service__paragraph">A metro map that clarify users to know and understand the metro network in addition to the stations and paths used for transportation</p>
                </div>
</a>
            </div>
            <div class="col-md-4">
<a href="Ticket.php">
                <div class="thumbnail">
                  <i class="material-icons"><img src="img/ticket.svg" alt=""></i>
                  <h4 class="service__title">Buy a ticket</h4>
                  <p class="service__paragraph">Get tickets online now without having to go to the ticket centers, to save time and effort</p>
                 <br>
                </div>
</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="about">
      <div class="container">
        <div class="page-section">
          <div class="text-center">
            <h2 class="page-section__title">ABOUT RIYADH METRO</h2>
            <p class="page-section__paragraph">An overview of the Riyadh Metro project and its most prominent features and services, in addition to some statistics</p>
          </div>
            <div class="about--narrow row gutters-50">
              <div class="col-md-6">
                <img class="img-responsive" src="img/RM_2.jpg" alt="">
              </div>
              <div class="col-md-6 about__extra-padding">
                <p class="about__content-subTitle">Riyadh Metro project offers you a distinctive public transport service, through 6 main paths covering 176 km from Riyadh and 85 stations equipped with the latest technologies that give you an exceptional experience while touring throughout the city of Riyadh.</p>
                  <a class="button--light" href="About.php">READ MORE</a>
                </div>
              </div>
          </div>
        </div>

      </section>
      
      <section class="contact contact--bg changeColor">
      <div class="container">
        <div class="page-section text-center changeColor">
        <div class="overview__wrapper text-center changeColor">
              <ul>
                <li>
                  <h1 class="overview__number">6</h1>
                  <p class="overview__title">NUMBER OF PATHS</p>
                </li>
                <li>
                  <h1 class="overview__number">85</h1>
                  <p class="overview__title">STATIONS</p>
                </li>
                <li>
                  <h1 class="overview__number">176 <small style="color:inherit;">KM</small> </h1>
                  <p class="overview__title">SYSTEM LENGTH</p>
                </li>
              </ul>
            </div>
        </div>
      </div>
    </section>
          
    <section class="about page-section" style="margin-top: 150px">
      <div class="container">
          <div class="text-center">
            <h2 class="page-section__title">Technologies and features</h2>
            <p class="page-section__paragraph">An overview of the latest advanced technologies and features used in the Riyadh Metro project</p>
          </div>
            <div class="about--narrow row gutters-50">
              <div class="col-md-6">
                <img class="img-responsive" src="img/RM_3.jpg" alt="">
              </div>
              <div class="col-md-6 about__extra-padding">
                <p class="about__content-subTitle">Riyadh metro offers you a unified design, equipped with advanced technologies, which gives it a distinctive feature in terms of design, as the metro adopts the automatic self-driving (without driver) by controlling it from central control rooms with specifications that enable it to follow up with high accuracy.

The specifications of the metro included the latest technology in the manufacture around the world.</p>
                  <a class="button--light" href="About.php">READ MORE</a>
                </div>
              </div>
        </div>
      </section>

      <div class="container">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>

                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/VMh1ll5i41s?autoplay=1&iv_load_policy=3&loop=1&modestbranding=1&playlist=VMh1ll5i41s" frameborder="0" allowfullscreen="" id="video"  allowscriptaccess="always"></iframe>
                </div>                                       
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <section class="video-section video-section--bg" style="height: 375px;">
        <div class="container">
          <div class="page-section--large text-center">
            <button class="video-section__icon" data-toggle="modal" data-target="#myModal"><img src="assets/images/video-icon.png" style="margin-top: -50px" alt=""></button>
          </div>
        </div>
      </section>

<?php if(mysqli_num_rows($resultNews) > 0) { 
          while($row = mysqli_fetch_assoc($resultNews)) { ?>
      <section class="about page-section" style="margin-top: 150px">
      <div class="container">
          <div class="text-center">
            <h2 class="page-section__title">LATEST NEWS</h2>
            <p class="page-section__paragraph">An overview of the latest news and the development proccess in the Riyadh metro</p>
          </div>
            <div class="about--narrow row gutters-50">
              <div class="col-md-6">
                <img class="img-responsive" src="savedImg/<?php echo $row['image'] ?>" alt="">
              </div>
              <div class="col-md-6 about__extra-padding">
              <h3 class="about__content-title"><?php echo $row['title'] ?></h3>
                <p class="about__content-subTitle"><?php echo $row['text'] ?></p>
                </div>
              </div>
        </div>
      </section>
<?php } } ?>

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





