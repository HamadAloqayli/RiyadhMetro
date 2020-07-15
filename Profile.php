<?php

include "database.php";

session_start();

if(!isset($_SESSION['phone']))
{
    header("Location:Home.php");
    mysqli_close($con);
    exit();
}

$sqlData = " SELECT * FROM customer WHERE id = ".$_SESSION['id']." ";

$resultData = mysqli_query($con,$sqlData);


?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Profile - page</title>
  <meta name="keywords" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.">
  <meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.">
  
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/flat-icon/flaticon.css">
  <link rel="stylesheet" href="temp/styles/styles.css?ts=<?=time()?>">
  <link rel="stylesheet" href="temp/styles/myStyles.css?ts=<?=time()?>">
  <!-- <link rel="stylesheet" href="css/styles.css?ts=<?=time()?>"> -->

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


                                                            <!-- Profile section -->
<div class="container section" style="width: 75%; margin-top: 50px;">

<div class="holderNews flexCenter">
                <?php if(mysqli_num_rows($resultData) > 0) {
                        while($row = mysqli_fetch_assoc($resultData)) { ?>
        <h3 class="page-section__title" style="margin-top: 20px">MY PROFILE</h3>
          <br>

          <?php

                        if(isset($_GET['errorInName']))
                        echo '
                        <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                             There was an error in writing the name
                        </div>';

                        if(isset($_GET['errorInPhone']))
                            echo '
                            <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                                 There is an error in writing the phone
                            </div>';

                            if(isset($_GET['errorInEmailDuplicate']))
                            echo '
                            <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                                  Email has already been used
                            </div>';

                            if(isset($_GET['errorInPassword']))
                            echo '
                            <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                            The password must be more than (3) digits
                            </div>';

                            if(isset($_GET['notCompatable']))
                            echo '
                            <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                                The password and password confirmation does not match
                            </div>';

                        if(isset($_GET['success']))
                            echo '
                            <div id="successMsg" class="mt-3 text-success text-center mb-4">
                                 The profile has been edit successfuly
                            </div>';


                ?>

          <form action="editProfile.php" method="POST" class="flexCenter needs-validation" novalidate>
              <label> 
                    Name
                  <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>" required>
              </label>
              <br>
              <label>
                  Email
                  <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" required>
              </label>
              <br>
              <label>
                  Phone
                  <input type="text" class="form-control" name="phone" value="<?php echo "0".$row['phone'] ?>" required>
              </label>
<br>

            <a href="#" style="color: var(--main-color);" data-toggle="collapse" data-target="#changeP" type="button">
                <strong style="float: right">CHANGE PASSWORD ACCOUNT</strong>
            </a>

<div id="changeP" class="collapse">
    <br>
                <label>
                      New Password
                      <input type="password" class="form-control" name="password" value="">
                  </label>
                  <br>
                  <br>
                  <label>
                      Confirm New Password
                      <input type="password" class="form-control" name="cpassword" value="">
                  </label>
                  <br>
</div>
<br>
            <div style="display: flex; justify-content:space-between; align-items:center;color: var(--main-color); width:100%;">
                <a href="purchasedCard.php"><strong>MY CARD</strong></a>
                <a href="BookedTicket.php"><strong>MY TICKETS</strong></a>
            </div>
<br>
              <label>
                  <button type="submit" class="btn btn-outline-danger submit" style="background-color: white" name="submit">Submit</button>
              </label>


          </form>

                <?php } } ?>
</div>

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
  <script src="js/script.js?ts=<?=time()?>"></script>
</body>
</html>
