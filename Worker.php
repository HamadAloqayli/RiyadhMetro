<?php

include "database.php";

session_start();

    
    $sql_ShowWorker = " SELECT * FROM customer_support ORDER BY id ASC ";
    
    $result_ShowWorker = mysqli_query($con,$sql_ShowWorker);


?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Worker - page</title>
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


                                                            <!-- Worker section -->
<div class="container section" style="width: 75%; margin-top: 50px;">
<h3 class="page-section__title" style="text-align:center;margin-top: 20px;">MANAGE ACCOUNTS</h3>
<br>
<div class="holderFormAdd">

	<button style="width: auto; color: var(--main-color)" data-toggle="collapse" data-target="#form1" type="button" class="btn btn-outline-danger form-control addWorker addWorkerBtn mb-4" data="newWorker" id="test">Create customer support account</button>
  
  <?php
                        if(isset($_GET['errorInSubmit']))
                            echo '
                            <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                                  Could not create new account 
                            </div>';

                        if(isset($_GET['errorInName']))
                            echo '
                            <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                                  Error in writing customer support name
                            </div>';

                            if(isset($_GET['errorInEmailDuplicate']))
                                echo '
                                <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                                      The email has been used before  
                                </div>';
                                
                                if(isset($_GET['errorInPassword']))
                                    echo '
                                    <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                                            The password must be more than (3) digits 
                                    </div>';

                        if(isset($_GET['success']))
                            echo '
                            <div id="successMsg" class="mt-3 text-success text-center mb-4">
                                The account has been created successfuly
                            </div>';

                            if(isset($_GET['errorInSubmitE']))
                            echo '
                            <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                                  Could not edit the account
                            </div>';

                            if(isset($_GET['errorInWorkerNameE']))
                            echo '
                            <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                            Error in writing customer support name
                            </div>';

                            if(isset($_GET['successE']))
                            echo '
                            <div id="successMsg" class="mt-3 text-success text-center mb-4">
                                The account has beddn edited successfuly
                            </div>';

                            if(isset($_GET['successD']))
                            echo '
                            <div id="successMsg" class="mt-3 text-success text-center mb-4">
                            The account has beddn deleted successfuly
                            </div>';

?>

			<div class="formAdd addWorkerForm collapse" id="form1">
					<form action="addWorker.php" method="POST" class="row row1 text-center needs-validation" style="display:flex !important;margin-top:30px; justify-content:center; align-items:center" novalidate>

							<input type="text" name="nameAdd" class="form-control col-md-3 col-xs-6" id="newName" placeholder="Name" required>
						
							<input type="email" name="emailAdd" class="form-control col-md-3 col-xs-6" id="newEmail" placeholder="Email" required>
	
							<input type="password" name="passwordAdd" class="form-control col-md-3 col-xs-6" id="newPassword" placeholder="Password" required>
							
                        <button type="submit" class="btn btn-outline-danger submit col-xs-1" style="background-color: white" name="submit">Submit</button>

						</form>
			</div>
</div>

<br>
<br>

<div class="showTable mx-auto table-responsive" style="text-align: center; margin:auto">
	<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>

	  <?php
      $i=0;
      if(mysqli_num_rows($result_ShowWorker) > 0){
	  while ($row = mysqli_fetch_array($result_ShowWorker)) {
		?>
	  
    <tr>
      <th scope='row'><?php echo ++$i ?></th>
      <td><?php echo $row['id'] ?></td>
	  <td><?php echo $row['name'] ?></td>
	  <td><?php echo $row['email'] ?></td>
	  <td><a href="#" data-toggle="collapse" data-target="#form3" title="edit" class="toEditW" onclick="getEdit(<?php echo $row['id'] ?>,'<?php echo $row['name'] ?>','<?php echo $row['email'] ?>')"> <img src="img/edit.png"></a></td>
    <td><a href="#" style="cursor: pointer" data-toggle="modal" data-target="#exampleModal" onclick="toDeleteWorker(<?php echo $row['id'] ?>)" title="delete"><img src="img/x-button.png"></a></td>

    </tr>

	<?php
      } }
      else
        echo 'sorry no data';
	?>

  </tbody>
</table>

  </div>
  
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header flex-row-reverse">
        <h5 class="modal-title" id="exampleModalLabel">Confirm delete proccess</h5>
      </div>
      <div class="modal-footer" style="display: flex">
        <button type="button" class="btn btn-outline-danger form-control delWorker" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-outline-danger form-control position-relative delWorker"><a href="#" class="stretched-link" style="color: var(--main-color);display:inline-block; width:100%; height:100%;">Delete</a></button>
      </div>
    </div>
  </div>
</div>
	  
		<div class="formEdit holderFormAdd editWorkerForm my-5 collapse" id="form3">
                <form action="editWorker.php" method="POST" style="display:flex !important;margin-top:30px; justify-content:center; align-items:center needs-validation" class="row row1 text-center needs-validation" novalidate>
                
						<input type="text" name="nameEdit" id="editName" class="form-control col-4" value="" placeholder="Name" required>
					
						<input type="email" name="emailEdit" id="editEmail" class="form-control col-4" value="" placeholder="Email" required>

					    <input type="hidden" name="idEdit" id="editId" value="">
  				
                    <!-- <input type="submit" class="btn btn-success" value="send" onclick="confirm('are you sure ?')?alert('done'):alert('sory')"> -->
                    <button type="submit" class="btn btn-outline-danger submit col-1" style="background-color: white" name="submit">Submit</button>
			 	 </form>
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
