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

$sql = " SELECT * FROM card WHERE userId = '$id' AND role = '$role' AND status = 1 ORDER BY id DESC ";

$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_assoc($result))
  {

    if($row['type'] == '1week')
            {
                $period = "1 Week";
                $price = 45;
                $parking = "two";
                $quantity = 1;
                $addDay = "+7 days";
                $suspend = 1;
            }
            else if($row['type'] == '1month')
            {
                $period = "1 Month";
                $price = 180;
                $parking = "six";
                $quantity = 4;
                $addDay = "+30 days";
                $suspend = 5;
            }
            else if($row['type'] == '3month')
            {
                $period = "3 Months";
                $price = 540;
                $parking = "nine";
                $quantity = 4*3;
                $addDay = "+90 days";
                $suspend = 10;
            }
            else if($row['type'] == '6month')
            {
                $period = "6 Months";
                $price = 1080;
                $parking = "fifteen";
                $quantity = 4*6;
                $addDay = "+180 days";
                $suspend = 15;
            }
            else
            {
                $period = "1 Year";
                $price = 2160;
                $parking = "twenty";
                $quantity = 4*12;
                $addDay = "+360 days";
                $suspend = 20;
            }

    $current_date = strtotime(date("Y-m-d"));
    $Purchused_date = strtotime($row['Pdate']);
    $Expiry_date = strtotime($row['Edate']);
    $diff = $Expiry_date - $current_date;
    $rmDay = $diff / 86400;


    if($rmDay < 0)
    {

      header('Location:deleteCard.php?cardId='.$row['id']);
      // echo "Card is Expiried";
    }

    
  }
}
else
{
  $Purchused_date = 0;
  $Expiry_date = 0;
  $diff = $Expiry_date - $Purchused_date;
  $rmDay = $diff / 86400;
}


?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Card - page</title>
  <meta name="keywords" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.">
  <meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.">
  
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/flat-icon/flaticon.css">
  <link rel="stylesheet" href="temp/styles/styles.css?ts=<?=time()?>">
  <link rel="stylesheet" href="temp/styles/myStyles.css?ts=<?=time()?>">
  <style>
      img.iimmgg
      {
        width: 150px;
        height: 150px;
        display: block;
        margin: auto;
        margin-top: 75px !important;
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

    body { font-family: sans-serif; }

.scene {
  width: 500px;
  height: 300px;
  margin: 40px 0;
  perspective: 600px;
  border-radius: 30px;
}

.card {
  width: 100%;
  height: 100%;
  transition: transform 1s;
  transform-style: preserve-3d;
  cursor: pointer;
  position: relative;
  border-radius: 30px;
}

.card.is-flipped {
  transform: rotateY(180deg);
}

.card__face {
  position: absolute;
  width: 100%;
  height: 100%;
  line-height: 260px;
  color: white;
  text-align: center;
  font-weight: bold;
  font-size: 40px;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  border-radius: 30px;
}

.card__face--front {

}

.card__face--back {

  transform: rotateY(180deg);
  background-color: #6bbf43;
}

@media (max-width: 575.98px) { 

  .scene {
  width: 350px;
  height: 200px;
}
#cardShape
 {
     height: 200px;
     width: 350px;
 }
#cardShape img
 {
     height: 75px;
     width: 200px;
    }
    img.iimmgg
      {
        width: 100px !important;
        height: 100px !important;
        margin-top: 50px !important;
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

      <div class="container" style="margin-top: 100px">
        <section class="price">
          <div class="page-section page-section--small">
            <h2 class="page-section__title text-center">Purchased Card</h2>
      <br><br>
      <div class="price__panel-wrapper">

        <?php if(mysqli_num_rows($result) > 0) { ?>

      <div class="row">
                          <div class="col-md-6" style="display:flex; flex-direction:column; justify-content: center; align-items:center">
                               
                          
                          <div class="scene scene--card">
                            <div class="card">
                                <div class="card__face card__face--front"><div id="cardShape"><div id="cardColor"></div><img src="img/logo.png" alt=""></div></div>
                                <div class="card__face card__face--back"><img class="iimmgg" src="https://api.qrserver.com/v1/create-qr-code/?data=Example&amp;size=150x150" alt="" title="" /></div>
                            </div>
                          </div>
                          
                          <br>
                                      <div style="color: var(--main-color); text-align:center; font-size: 16px">
                                          <strong>Click on the card to see the qrCode</strong>
                                      </div>

                          </div>

                          <div class="col-md-6" style="display:flex ;justify-content: flex-center; align-items:center;">
                    <div id="cardContent" style="margin-left: 100px;">
                                  <p>Type: <?php echo $period ?></p>

                                  <a href="#" style="color: gray" id="pShow" data-toggle="collapse" data-target="#showUl" type="button">
                                      <p>Features</p>
                                  </a>

                                  <div id="showUl" class="collapse">
                                      <ul>
                                        <li>Unlimited use</li>
                                        <li>Free wifi</li>
                                        <li>Free parking for <?php echo $parking ?> hours</li>
                                      </ul>
                                  </div>

                                  <?php   
                                  
                                  // $date1 = date("Y-m-d");
                                  // $date2 = $date;

                                  // $diff = strtotime($date2) - strtotime($date1);
                                  // $rmDay = $diff / 86400;
                                  
                                  ?>
                                  <hr>
                                  <p>Purchase date: <?php echo date("Y-m-d",$Purchused_date) ?> </p>
                                  <p>Expiry date: <?php echo date("Y-m-d",$Expiry_date) ?> </p>
                                  <p>Remaining: <?php echo ($rmDay == 0 ? 'Last': $rmDay ) ?> <small style="font-size: 12px">day</small></p>
                                  
                                  <!-- <hr>

                                  <a href="#" class="btn btn-danger" data-toggle="collapse" data-target="#showSe" type="button" style="transition: all 0.2s ease-in-out">
                                      Subscription Suspend
                                  </a>
<br>
                                  <div id="showSe" class="collapse">
                                    <span>How many day ?</span>
                                  <form action="" style="display: inline-block; margin-left: 10px;">
                                    <select name="" id="">
                                      <option value="">1</option>
                                      <option value="">2</option>
                                      <option value="">3</option>
                                      <option value="">4</option>
                                      <option value="">5</option>
                                    </select>
                                  </form>
                                  </div> -->

                    </div>
                          </div>

                      </div>

        <?php } ?>

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