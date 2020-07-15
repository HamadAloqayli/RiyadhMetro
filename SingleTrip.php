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

  <style>

      #steps
      {
        display: flex;
        justify-content: space-between; 
        align-items:center; width:300px; 
        margin:auto;
        position: relative;
      }
      #steps div
      {
        font-size: 20px;
        width: 40px;
        font-weight:600; 
        border: 3px solid var(--main-color); 
        border-radius: 50%;
        text-align: center;
        color: gray;
        background-color: white;
      }
      #steps div:nth-child(1)
      {
        background-color: var(--main-color);
        color: white;
      }
      #stroke
      {
        border-radius:0 !important; 
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        width: 300px !important;
        height: 3px;
        background-color: var(--main-color);
        z-index: -999 !important;
      }

      label
      {
        margin-left: 1.75px;
      }

      #singleForm .row .holdintPaths
      {
        justify-content: center !important;
      }
    

    @media (min-width: 576px) { 
      label
      {
        margin-left: 20px;
      }
      .ml-5
    {
          margin-left: 5vw ;
    }
      .mr-5
    {
        margin-right: 5vw ;
    }
 }

  </style>
  
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
    <br>
    <div id="steps">
              <div>1</div>
              <div>2</div>
              <div>3</div>

              <div id="stroke"></div>
    </div>

    <div class="container" style="margin-top: 100px">
        <section class="price">
          <div class="page-section page-section--small">
            <h2 class="page-section__title text-center">SINGLE TRIP</h2>
            <a href="img/map.jpg" style="color: var(--main-color);" target="_blank">
                    <strong style="float: right">VIEW THE MAP</strong>
             </a>
<br><br>
<div class="price__panel-wrapper">
   <form action="DetailSingle.php" method="POST" id="singleForm">
        <div class="row" style="display: flex; align-items: center; margin-bottom: 3vh;">                <!-- paths -->
            <div class="col-xs-3" style="width: auto; padding: 0;">
                                <label>Number of paths to use</label>
            </div>
                <div class="col-sm-1 col-xs-3">
                                <select class="form-control numPaths" name="numPaths">
                                    <option></option>                                    
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                </select>
                 </div>
        </div>
    <div class="holdingPaths">
        <div class="row hidePath" style="display: flex;justify-content:center; align-items: flex-end; margin-bottom: 2.5vh;">                   <!-- path 1 -->
                        <div class="col-xs-2" style="width: auto; padding: 0;";>
                                        <label class="labelPath">Path 1</label>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                                        <select class="form-control path" name="path1">
                                            <option></option>
                                            <option>Blue</option>
                                            <option>Red</option>
                                            <option>Orange</option>
                                            <option>Yellow</option>
                                            <option>Green</option>
                                            <option>Purple</option>
                                        </select>
                        </div>
                        <div class="col-xs-2 ml-5" style="width: auto; padding: 0;">
                                    <label>From</label>
                        </div>
                        <div class="col-sm-2 col-xs-3 mr-5">
                            <select class="form-control from" name="from1">

                            </select>
                        </div>
                <div class="col-xs-2" style="width: auto; padding: 0;">
                            <label>To</label>
                </div>
                <div class="col-sm-2 col-xs-3">
                    <select class="form-control to" name="to1">

                    </select>
                </div>
          </div>
          <div class="row hidePath" style="display: flex; justify-content:center; align-items: flex-end; margin-bottom: 2.5vh;">                   <!-- path 2 -->
                        <div class="col-xs-2" style="width: auto; padding: 0;";>
                                        <label class="labelPath">Path 2</label>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                                        <select class="form-control path" name="path2">
                                            <option></option>
                                            <option>Blue</option>
                                            <option>Red</option>
                                            <option>Orange</option>
                                            <option>Yellow</option>
                                            <option>Green</option>
                                            <option>Purple</option>
                                        </select>
                        </div>
                        <div class="col-xs-2 ml-5" style="width: auto; padding: 0;">
                                    <label>From</label>
                        </div>
                        <div class="col-sm-2 col-xs-3 mr-5">
                            <select class="form-control from" name="from2">

                            </select>
                        </div>
                <div class="col-xs-2" style="width: auto; padding: 0;">
                            <label>To</label>
                </div>
                <div class="col-sm-2 col-xs-3">
                    <select class="form-control to" name="to2">

                    </select>
                </div>
          </div>
          <div class="row hidePath" style="display: flex; justify-content:center; align-items: flex-end; margin-bottom: 2.5vh;">                   <!-- path 3 -->
                        <div class="col-xs-2" style="width: auto; padding: 0;";>
                                        <label class="labelPath">Path 3</label>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                                        <select class="form-control path" name="path3">
                                            <option></option>
                                            <option>Blue</option>
                                            <option>Red</option>
                                            <option>Orange</option>
                                            <option>Yellow</option>
                                            <option>Green</option>
                                            <option>Purple</option>
                                        </select>
                        </div>
                        <div class="col-xs-2 ml-5" style="width: auto; padding: 0;">
                                    <label>From</label>
                        </div>
                        <div class="col-sm-2 col-xs-3 mr-5">
                            <select class="form-control from" name="from3">

                            </select>
                        </div>
                <div class="col-xs-2" style="width: auto; padding: 0;">
                            <label>To</label>
                </div>
                <div class="col-sm-2 col-xs-3">
                    <select class="form-control to" name="to3">

                    </select>
                </div>
          </div>
          <div class="row hidePath" style="display: flex; justify-content:center; align-items: flex-end; margin-bottom: 2.5vh;">                   <!-- path 4 -->
                        <div class="col-xs-2" style="width: auto; padding: 0;";>
                                        <label class="labelPath">Path 4</label>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                                        <select class="form-control path" name="path4">
                                            <option></option>
                                            <option>Blue</option>
                                            <option>Red</option>
                                            <option>Orange</option>
                                            <option>Yellow</option>
                                            <option>Green</option>
                                            <option>Purple</option>
                                        </select>
                        </div>
                        <div class="col-xs-2 ml-5" style="width: auto; padding: 0;">
                                    <label>From</label>
                        </div>
                        <div class="col-sm-2 col-xs-3 mr-5">
                            <select class="form-control from" name="from4">

                            </select>
                        </div>
                <div class="col-xs-2" style="width: auto; padding: 0;">
                            <label>To</label>
                </div>
                <div class="col-sm-2 col-xs-3">
                    <select class="form-control to" name="to4">

                    </select>
                </div>
          </div>
          <div class="row hidePath" style="display: flex; justify-content:center; align-items: flex-end; margin-bottom: 2.5vh;">                   <!-- path 5 -->
                        <div class="col-xs-2" style="width: auto; padding: 0;";>
                                        <label class="labelPath">Path 5</label>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                                        <select class="form-control path" name="path5">
                                            <option></option>
                                            <option>Blue</option>
                                            <option>Red</option>
                                            <option>Orange</option>
                                            <option>Yellow</option>
                                            <option>Green</option>
                                            <option>Purple</option>
                                        </select>
                        </div>
                        <div class="col-xs-2 ml-5" style="width: auto; padding: 0;">
                                    <label>From</label>
                        </div>
                        <div class="col-sm-2 col-xs-3 mr-5">
                            <select class="form-control from" name="from5">

                            </select>
                        </div>
                <div class="col-xs-2" style="width: auto; padding: 0;">
                            <label>To</label>
                </div>
                <div class="col-sm-2 col-xs-3">
                    <select class="form-control to" name="to5">

                    </select>
                </div>
          </div>
          <div class="row hidePath" style="display: flex; justify-content:center; align-items: flex-end; margin-bottom: 2.5vh;">                   <!-- path 6 -->
                        <div class="col-xs-2" style="width: auto; padding: 0;";>
                                        <label class="labelPath">Path 6</label>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                                        <select class="form-control path" name="path6">
                                            <option></option>
                                            <option>Blue</option>
                                            <option>Red</option>
                                            <option>Orange</option>
                                            <option>Yellow</option>
                                            <option>Green</option>
                                            <option>Purple</option>
                                        </select>
                        </div>
                        <div class="col-xs-2 ml-5" style="width: auto; padding: 0;">
                                    <label>From</label>
                        </div>
                        <div class="col-sm-2 col-xs-3 mr-5">
                            <select class="form-control from" name="from6">

                            </select>
                        </div>
                <div class="col-xs-2" style="width: auto; padding: 0;">
                            <label>To</label>
                </div>
                <div class="col-sm-2 col-xs-3">
                    <select class="form-control to" name="to6">

                    </select>
                </div>
          </div>
    </div>
    
    <div class="row" style="display: flex; align-items: center; margin-bottom: 3vh;">                <!-- passengers -->
            <div class="col-xs-3" style="width: auto; padding: 0;">
                                <label>Number of tickets</label>
            </div>
                <div class="col-sm-1 col-xs-3">
                                <select class="form-control numPassengers" name="numTickets">
                                    <option></option>                                    
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                </select>
                 </div>
        </div>
        
        <div class="row" style="display: flex; align-items: center; margin-bottom: 3vh;">                <!-- class -->
            <div class="col-xs-3" style="width: auto; padding: 0;">
                                <label>Class of tickets</label>
            </div>
                <div class="col-sm-2 col-xs-4">
                                <select class="form-control class" name="class">
                                    <option></option>                                    
                                    <option>Economy</option>
                                    <option>Business</option>
                                </select>
                 </div>
        </div>

                <button type="submit" name="submit" class="btn btn-outline-danger submit" style="font-weight: 300; background-color: white;display: block; margin: auto;">SUBMIT</button>

        </form>

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

</body>
</html>





