<?php

session_start();

include "database.php";

if(!isset($_SESSION['phone']))
{
    header("Location:Home.php");
    mysqli_close($con);
    exit();
}

date_default_timezone_set('Asia/Riyadh');

$id = $_SESSION['id'];

$role = 'customer';

$sql = " SELECT * FROM ticket WHERE userId = '$id' AND role = '$role'  ORDER BY id DESC ";

$result = mysqli_query($con,$sql);


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
      img.iimmgg
      {
        width: 200px;
        height: 200px;
        display: block;
        margin: auto;
      }
    small
    {
      font-size: 10px;
    }
    .ticketDate
    {
        color: var(--main-color);
        font-size: 3rem;
        font-weight: 600;
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

      <div class="container" style="margin-top: 100px">
        <section class="price">
          <div class="page-section page-section--small">
            <h2 class="page-section__title text-center">Booked Tickets</h2>
      <br><br>
      <div class="price__panel-wrapper">
        
             <?php if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) { 
                            
                            $day = "";                                                // Holder date
                            $Cdate = date("Y-m-d");                                   // Current date
                            $Bdate = date("Y-m-d", strtotime(' -1 day' ) );           // Before date

                            if($row['date'] == $Cdate)
                                $day = "Today";

                            else if($row['date'] == $Bdate)
                              $day = "Yesterday";

                            else
                                $day = $row['date'];
                            
                          ?>
                                                
                            <p class="ticketDate"><?php echo $day ?></p>

                            <div class="ticketsHolder row gutters-50" style="margin-top: 20px;">
                                <?php 
                                          if($row['paths'] == 'All') { 
                                              for($i =0; $i < $row['nubmerOfTickets']; $i++) {
                                            ?>

                                         <div id="detail" class="col-lg-6" style="margin-bottom:50px">
                                            <div id="headerDetail"><p>Ticket <?php echo $i+1; ?></p></div>
                                                <img style="display:block;margin:auto; margin-top:20px;" src="https://api.qrserver.com/v1/create-qr-code/?data=Example&amp;size=150x150" alt="" title="" />
                                                <hr>
                                                <div class="contentDetail">
                                                <p>Path </p>
                                                <p><?php echo 'All paths' ?></p>
                                            </div>
                                                <div class="contentDetail">
                                                <p>From</p>
                                                <p><?php echo 'Any station' ?></p>
                                            </div>
                                                <div class="contentDetail">
                                                <p>To</p>
                                                <p><?php echo 'Any station' ?></p>
                                            </div>
                                            <hr>
                                            <div class="contentDetail">
                                            <p>Class</p>
                                            <p><?php echo $row['class'] ?></p>
                                        </div>
                                            <div id="footerDetail"><a href="https://api.qrserver.com/v1/create-qr-code/?data=Example&amp;size=150x150" target="_blank">Print</a></div>
                                        </div>
                         <?php } }
                                else{
                                         $paths = array();
                                         $froms = array();
                                         $tos = array(); 

                                         $paths = explode(",",$row['paths']);
                                         $froms = explode(",",$row['fromm']);
                                         $tos = explode(",",$row['too']);

                                         for($i = 0; $i < $row['nubmerOfTickets']; $i++){
                              ?>

                                         <div id="detail" class="col-lg-6" style="margin-bottom:50px">
                                            <div id="headerDetail"><p>Ticket <?php echo $i+1; ?></p></div>
                                                <img style="display:block;margin:auto; margin-top:20px;" src="https://api.qrserver.com/v1/create-qr-code/?data=Example&amp;size=150x150" alt="" title="" />
                                                <hr>
                                                    <?php 
                                                          for($j = 0; $j < count($paths); $j++)
                                                          {
                                                            echo '<div class="contentDetail">
                                                            <p>Path </p>
                                                            <p>'.$paths[$j].'</p>
                                                          </div>
                                                          <div class="contentDetail">
                                                            <p>From</p>
                                                            <p>'.$froms[$j].'</p>
                                                        </div>
                                                          <div class="contentDetail">
                                                            <p>To</p>
                                                            <p>'.$tos[$j].'</p>
                                                          </div>
                                                          <hr>';
                                                          }                           
                                                    
                                                    ?>
                                            <div class="contentDetail">
                                            <p>Class</p>
                                            <p><?php echo $row['class'] ?></p>
                                        </div>
                                            <div id="footerDetail"><a href="https://api.qrserver.com/v1/create-qr-code/?data=Example&amp;size=150x150" target="_blank">Print</a></div>
                                        </div>

                                    <?php } } ?>
                            </div>
                            <br><hr><br>


            <?php } } ?>
                
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