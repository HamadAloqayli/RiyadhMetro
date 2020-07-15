<?php

include "database.php";

session_start();

date_default_timezone_set('Asia/Riyadh');


    if(!isset($_SESSION['id']))
    {
      header("Location:Home.php?errorInRegister");
      mysqli_close($con);
      exit();
    }

    $id = $_SESSION['id'];

    if(isset($_SESSION['phone']))
    {
      $role = "customer";

      $sql = " SELECT * FROM letter WHERE status = 0 AND customer_id = '$id' ORDER BY date DESC ";
      $result = mysqli_query($con,$sql);
    }
    else if(isset($_SESSION['rating']))
    {
      $role = "cs";

      $sql = " SELECT * FROM letter WHERE status = 1 ORDER BY date DESC ";
      $result = mysqli_query($con,$sql);
    }
    else
    {
      $role = "admin";

      $sql = " SELECT * FROM letter WHERE status = 2 ORDER BY date DESC ";
      $result = mysqli_query($con,$sql);
    }



?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Letter - page</title>
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


                                                            <!-- Letter section -->
<div class="container section" style="width: 75%; margin-top: 50px;">
<h3 class="page-section__title" style="text-align:center;margin-top: 20px;">Requests and complaints letters</h3>
<br>
<div class="holderFormAdd">

<?php if($role == "customer"){ ?>
	<button style="width: auto; color: var(--main-color)" data-toggle="collapse" data-role="customer" data-target="#form1" type="button" class="btn btn-outline-danger form-control addWorker addWorkerBtn letterBtn mb-4" data="newWorker" id="test">Send a letter to customer support</button>
<?php } ?>

<?php if($role == "cs"){ ?>
	<button style="width: auto; color: var(--main-color)" data-toggle="collapse" data-role="cs" data-target="#form1" type="button" class="btn btn-outline-danger form-control addWorker addWorkerBtn letterBtn mb-4" data="newWorker" id="test">Send a letter to admin</button>
<?php } ?>

<?php if($role == "admin"){ ?>
	<button style="width: auto; color: var(--main-color)" data-toggle="collapse" data-role="admin" data-target="#form1" type="button" class="btn btn-outline-danger form-control addWorker addWorkerBtn letterBtn mb-4" data="newWorker" id="test">Send a letter to customer support</button>
<?php } ?>
  <?php
                        if(isset($_GET['error']))
                            echo '
                            <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                                  Could not send the letter 
                            </div>';


                        if(isset($_GET['success']))
                            echo '
                            <div id="successMsg" class="mt-3 text-success text-center mb-4">
                                The letter was send successfuly
                            </div>';


?>

			<div class="formAdd addWorkerForm formLetter collapse" id="form1">
                        <form action="addLetter.php" method="POST" enctype="multipart/form-data" class="flexCenter needs-validation" novalidate>
                        <label style="width: 100%">
                            Title
                            <input type="text" class="form-control" name="title" value="" required>
                        </label>
                        <br>
                        <label style="width: 100%">
                            Text
                            <textarea name="text" id="" cols="30" rows="7" class="form-control" required></textarea>
                        </label>
            <br>
                        <label>
                            <button type="submit" class="btn btn-outline-danger submit" style="background-color: white" name="submit">Submit</button>
                        </label>

                        <input type="hidden" name="role" value="<?php echo $role ?>">
                        <input type="hidden" name="senderId" value="<?php echo $id ?>">

                    </form>
			</div>
</div>

<br><br>


<p style="font-size: 3rem; font-weight:600; color: var(--main-color)">Letters</p>

<div class="showTable mx-auto table-responsive" style="text-align: center; margin:auto">
	<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Text</th>
      <th scope="col">Date</th>
      <th scope="col">Sender</th>
    </tr>
  </thead>
  <tbody>
            <?php if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){ 
                      
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
    <tr>
      <td><?php echo $row['title'] ?></td>
      <td><?php echo $row['text'] ?></td>
      <td><?php echo $day ?></td>
      <td style="display:flex; flex-direction:column; justify-content:center; align-items:center; text-transform:capitalize;">
        <?php echo $row['sender'] ?>
        <?php echo ' <button data-toggle="modal" data-target="#exampleModal1" onclick="toReply(`'.$row['sender'].'`,'.$row['sender_id'].')" style="width: auto; color: var(--main-color); margin-top: 10px;" type="button" class="btn btn-outline-danger form-control addWorker addWorkerBtn mb-4" data="newWorker" id="test">Reply</button>'; ?>
        <?php if($role == "cs" && $row['sender'] == "customer") echo '	<button data-toggle="modal" data-target="#exampleModal" onclick="toTransfareLetter('.$row['id'].')" style="width: auto; color: var(--main-color); margin-top: 5px;" type="button" class="btn btn-outline-danger form-control addWorker addWorkerBtn mb-4" data="newWorker" id="test">Transfare to admin</button>'; ?>
      </td>
    </tr>
                    <?php } } ?>
  </tbody>
</table>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header flex-row-reverse">
        <h5 class="modal-title" id="exampleModalLabel">Confirm transfare proccess</h5>
      </div>
      <div class="modal-footer" style="display: flex">
        <button type="button" class="btn btn-outline-danger form-control delWorker tranProcess" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-outline-danger form-control position-relative delWorker tranProcess"><a href="#" class="stretched-link" style="color: var(--main-color);display:inline-block; width:100%; height:100%;">Transfare</a></button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header flex-row-reverse">
        <h5 class="modal-title" id="exampleModalLabel">Reply to the letter</h5>
      </div>
      <div class="modal-footer" style="display: flex; justify-content:center; align-items:center;">

      <form action="addLetter.php" method="POST" enctype="multipart/form-data" class="flexCenter formLetter needs-validation" style="text-align: left" novalidate>
                        <label style="width: 100%">
                            Title
                            <input type="text" class="form-control" name="title" value="" required>
                        </label>
                        <br>
                        <label style="width: 100%">
                            Text
                            <textarea name="text" id="" cols="30" rows="7" class="form-control" required></textarea>
                        </label>
            <br>
                        <label>
                            <button type="submit" class="btn btn-outline-danger submit" style="background-color: white" name="submit">Submit</button>
                        </label>

                        <input type="hidden" name="role" value="<?php echo $role ?>">
                        <input type="hidden" name="senderId" value="<?php echo $id ?>">

                        <input type="hidden" name="customer_role" value="">
                        <input type="hidden" name="customer_id" value="">

                    </form>

      </div>
    </div>
  </div>
</div>
  
  <br><br><br>

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
