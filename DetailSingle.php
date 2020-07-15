<?php

session_start();

include "database.php";

date_default_timezone_set('Asia/Riyadh');


if(!isset($_POST['submit']))
{
    header("Location:Ticket.php");
    mysqli_close($con);
    exit();
}
if(empty($_POST['numPaths']) || empty($_POST['class']) || empty($_POST['numTickets']))
{
  header("Location:Ticket.php");
  mysqli_close($con);
  exit();
}

$numPaths = $_POST['numPaths'];

$_SESSION['numPaths'] = $numPaths;

if(!empty($_POST['path1']))
  $path1 = $_POST['path1'];

  if(!empty($_POST['path2']))
  $path2 = $_POST['path2'];
  
  if(!empty($_POST['path3']))
  $path3 = $_POST['path3'];

  if(!empty($_POST['path4']))
  $path4 = $_POST['path4'];

  if(!empty($_POST['path5']))
  $path5 = $_POST['path5'];

  if(!empty($_POST['path6']))
  $path6 = $_POST['path6'];

  if(!empty($_POST['from1']))
  $from1 = $_POST['from1'];

  if(!empty($_POST['from2']))
  $from2 = $_POST['from2'];
  
  if(!empty($_POST['from3']))
  $from3 = $_POST['from3'];

  if(!empty($_POST['from4']))
  $from4 = $_POST['from4'];

  if(!empty($_POST['from5']))
  $from5 = $_POST['from5'];

  if(!empty($_POST['from6']))
  $from6 = $_POST['from6'];

  if(!empty($_POST['to1']))
  $to1 = $_POST['to1'];

  if(!empty($_POST['to2']))
  $to2 = $_POST['to2'];
  
  if(!empty($_POST['to3']))
  $to3 = $_POST['to3'];

  if(!empty($_POST['to4']))
  $to4 = $_POST['to4'];

  if(!empty($_POST['to5']))
  $to5 = $_POST['to5'];

  if(!empty($_POST['to6']))
  $to6 = $_POST['to6'];

  $numTickets = $_POST['numTickets'];

  $_SESSION['numTickets'] = $numTickets;

  $class = $_POST['class'];
if($class == 'Economy')
{
  $cost = 6;
}
else
{
  $cost = 8;
}
  $costPaths = $cost * $numPaths;
  $costTickets = $costPaths * $numTickets;

  $_SESSION['class'] = $class;

  $_SESSION['price'] =  $costTickets;

  $_SESSION['status'] = 1;

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
      #steps div:nth-child(1),#steps div:nth-child(2)
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
      
    small{
      font-size: 10px;
    }
    #detail
    {
      width: 50%;
    }
    @media (max-width: 575.98px) { 
      #detail
      {
          width: 100%;
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
            <h2 class="page-section__title text-center">TRIP DETAIL</h2>
<br>
<div class="price__panel-wrapper">
   
    <div id="detail">
        <div id="headerDetail"><a href="SingleTrip.php">Edit trip data</a></div>
        <?php if(isset($path1)) { ?>
            <div class="contentDetail" style="margin-top: 15px;">
              <p>Path 1</p>
              <p><?php echo $path1 ?></p>
          </div>
            <div class="contentDetail">
              <p>From</p>
            <p><?php echo $from1 ?></p>
          </div>
            <div class="contentDetail">
              <p>To</p>
            <p><?php echo $to1 ?></p>
          </div>
          <hr>
      <?php 
           $_SESSION['path1'] = $path1;
           $_SESSION['from1'] = $from1;
           $_SESSION['to1'] = $to1;
    } ?>
      <?php if(isset($path2)) { ?>
            <div class="contentDetail">
              <p>Path 2</p>
              <p><?php echo $path2 ?></p>
          </div>
            <div class="contentDetail">
              <p>From</p>
            <p><?php echo $from2 ?></p>
          </div>
            <div class="contentDetail">
              <p>To</p>
            <p><?php echo $to2 ?></p>
          </div>
          <hr>
      <?php 
            $_SESSION['path2'] = $path2;
            $_SESSION['from2'] = $from2;
            $_SESSION['to2'] = $to2;
    } ?>
      <?php if(isset($path3)) { ?>
            <div class="contentDetail">
              <p>Path 3</p>
              <p><?php echo $path3 ?></p>
          </div>
            <div class="contentDetail">
              <p>From</p>
            <p><?php echo $from3 ?></p>
          </div>
            <div class="contentDetail">
              <p>To</p>
            <p><?php echo $to3 ?></p>
          </div>
          <hr>
      <?php 
                $_SESSION['path3'] = $path3;
                $_SESSION['from3'] = $from3;
                $_SESSION['to3'] = $to3;
    } ?>
      <?php if(isset($path4)) { ?>
            <div class="contentDetail">
              <p>Path 4</p>
              <p><?php echo $path4 ?></p>
          </div>
            <div class="contentDetail">
              <p>From</p>
            <p><?php echo $from4 ?></p>
          </div>
            <div class="contentDetail">
              <p>To</p>
            <p><?php echo $to4 ?></p>
          </div>
          <hr>
      <?php 
                    $_SESSION['path4'] = $path4;
                    $_SESSION['from4'] = $from4;
                    $_SESSION['to4'] = $to4;
    } ?>
      <?php if(isset($path5)) { ?>
            <div class="contentDetail">
              <p>Path 5</p>
              <p><?php echo $path5 ?></p>
          </div>
            <div class="contentDetail">
              <p>From</p>
            <p><?php echo $from5 ?></p>
          </div>
            <div class="contentDetail">
              <p>To</p>
            <p><?php echo $to5 ?></p>
          </div>
          <hr>
      <?php 
                    $_SESSION['path5'] = $path5;
                    $_SESSION['from5'] = $from5;
                    $_SESSION['to5'] = $to5;
    } ?>
      <?php if(isset($path6)) { ?>
            <div class="contentDetail">
              <p>Path 6</p>
              <p><?php echo $path6 ?></p>
          </div>
            <div class="contentDetail">
              <p>From</p>
            <p><?php echo $from6 ?></p>
          </div>
            <div class="contentDetail">
              <p>To</p>
            <p><?php echo $to6 ?></p>
          </div>
          <hr>
      <?php 
                    $_SESSION['path6'] = $path6;
                    $_SESSION['from6'] = $from6;
                    $_SESSION['to6'] = $to6;
    } ?>
      <div class="contentDetail">
          <p>Number of tickets</p>
        <p><?php echo $numTickets ?></p>
      </div>
        <div class="contentDetail">
          <p>Class</p>
        <p><?php echo $class ?></p>
      </div>
        <div id="footerDetail"><a href="#">Total cost is <?php echo $costTickets ?><small>SR</small></a>

<div id="costDetail">
        <div class="contentDetail">
            <p>Cost per path</p>
          <p><?php echo $cost ?><small>SR</small></p>
        </div>
        <div class="contentDetail">
            <p>Cost for all paths</p>
          <p><?php echo $costPaths ?><small>SR</small></p>
        </div>
        <div class="contentDetail">
            <p>Cost for all tickets</p>
          <p><?php echo $costTickets ?><small>SR</small></p>
        </div>
</div>

      </div>
    </div>
<br><br>
<div style="width: 50%; margin: auto; display:flex;flex-direction:column; justify-content:center;align-items:center">
<?php if($class == 'Economy') { ?>
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="UWA88JGK5YWBC">
    <input type="hidden" name="quantity" value="<?php echo $numPaths*$numTickets ?>">
    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>
  <?php } ?>

  <?php if($class == 'Business') { ?>
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
      <input type="hidden" name="cmd" value="_s-xclick">
      <input type="hidden" name="hosted_button_id" value="RYR2GMHP8R9BY">
      <input type="hidden" name="quantity" value="<?php echo $numPaths*$numTickets ?>">
      <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
      <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
      </form>
  <?php } ?>

  <p style="margin: 10px auto;">OR</p>

  <a href="DisplayTicket.php">
	<button style="width: auto; color: var(--main-color)" type="button" class="btn btn-outline-danger form-control addWorker addWorkerBtn mb-4" data="newWorker" id="test">Skip The Payment</button>
  </a>

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

</body>
</html>