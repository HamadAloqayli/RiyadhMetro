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

if(isset($_SESSION['id']))
{
    header("Location:Home.php");
    exit();
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Sal.js CSS -->
    <link rel="stylesheet" href="sal-master/dist/sal.css">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css?ts=<?=time()?>">

    <title>Register - page</title>
  </head>
  <body style="height: 100vh; background-color: white;" class="d-flex justify-content-center align-items-center">
    
<div id="mainHolder" style="background-color: white;" class="container rounded-lg">
    <div class="coverHalf rounded-lg d-flex flex-column align-items-center">
        <div class="mainBg rounded-lg"></div>
        <img src="" alt="">
        <span id="coverState">Create account</span>
            
                <?php
                        if(isset($_GET['errorInName']) || isset($_GET['errorInEmailDuplicate']) || isset($_GET['errorInEmailCompatibility']) || isset($_GET['errorInPassword']) || isset($_GET['errorInPasswordCompatibility']) || isset($_GET['errorInPhoneLength']) || isset($_GET['errorInPhoneNumber']))
                            echo '
                            <div id="errorMsg" class="mt-3 text-danger">
                                There is an error in register
                            </div>';
                ?>
          
            
                <?php
                        if(isset($_GET['success']))
                            echo '
                            <div id="successMsg" class="mt-3 text-white">
                                Successfully registered
                            </div>';
                ?>
           <div id="backHome" class="mb-5">
               <a href="Home.php" style="color: white">Back to Home page</a>
           </div>
           <div class="CoverMainBg rounded-lg"></div>

    </div>
    <div class="row">
                                                                <!-- Login side -->
            <div id="subHolderLeft" class="col-6 flexContent ">
                 <p>Sign in</p>
                 <form action="checkAccount.php" method="post" class="needs-validation" novalidate>
                <input type="email" name="email" placeholder="Email" class="form-control" required>
                    <div class="invalid-feedback">

                    </div>
                <input type="password" name="password" placeholder="Password" class="form-control" required>
                    <div class="invalid-feedback">

                    </div>

                        <?php

                                if(isset($_GET['errorInRegister']))
                                    echo '
                                <div class="text-danger alert alert-dismissible fade show position-relative h-auto mb-0 mt-3 p-0">
                                     You must be logged in
                                </div>';

                                if(isset($_GET['errorInLogin']))
                                echo '
                            <div class="text-danger alert alert-dismissible fade show position-relative h-auto mb-0 mt-3 p-0">
                                There is an error in the email or password
                            </div>';
            
                        ?>

               <button type="submit" name="submit" class="btn btn-outline-danger submit" style="font-weight: 300;">Submit</button>
            </form>
            </div>
                                                                 <!-- Register side -->
            <div id="subHolderRight" class="col-6 flexContent ">
                 <p>Create account</p>
                 <form action="createAccount.php" method="post" id="registerForm" class="needs-validation" novalidate>
                <input type="text" placeholder="Name" name="name" class="form-control" required>
                    <div class="invalid-feedback d-block text-left">
                        <?php

                            if(isset($_GET['errorInName']))
                                echo 'There was an error in writing the name';

                        ?>
                    </div>
                <input type="email" name="email1" value="<?php 
                    if(isset($_GET['errorInEmailDuplicate'])) 
                        echo $_GET['errorInEmailDuplicate'];

                    else if(isset($_GET['errorInEmailCompatibility']))
                        echo $_GET['errorInEmailCompatibility'];
                
                ?>" placeholder="Email" class="form-control" required>
                    <div class="invalid-feedback d-block text-left">
                            <?php

                                if(isset($_GET['errorInEmailDuplicate']))
                                    echo 'Email has already been used';

                                if(isset($_GET['errorInEmailCompatibility']))
                                    echo 'Email and email confirmation are not compatible';

                            ?>
                    </div>
                <input type="email" name="email2" placeholder="Email confirmation" class="form-control" required>
                    <div class="invalid-feedback confirmEmail text-danger text-left">
                       
                    </div>
                <input type="password" name="password1" placeholder="Password" class="form-control" required>
                    <div class="invalid-feedback d-block text-left">
                         <?php

                            if(isset($_GET['errorInPassword']))
                                echo 'The password must be more than (3) digits';

                            if(isset($_GET['errorInPasswordCompatibility']))
                                echo 'The password and password confirmation do not match';

                         ?>
                    </div>
                <input type="password" name="password2" placeholder="Password confirmation" class="form-control" required>
                    <div class="invalid-feedback confirmPassword text-danger text-left">
                       
                    </div>
                <input type="text" name="phone" placeholder="Phone number" class="form-control" required>
                <!-- <small class="d-block text-left">مثال: 05XXXXXXXXXX</small> -->
                    <div class="invalid-feedback d-block text-left">
                        <?php

                            if(isset($_GET['errorInPhoneLength']))
                                echo 'The mobile number must be (10) digits';

                            if(isset($_GET['errorInPhoneNumber']))
                                echo 'The mobile number should only be numbers';
                            

                        ?>
                    </div>
                <button type="submit" name="submit" style="font-weight: 300;" class="btn btn-outline-danger submit">Submit</button>
            </form>
            </div>
    </div>
</div>

    

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/882f4098ed.js" crossorigin="anonymous"></script>

    <!-- MixitUp -->
    <script src="mixitup-3/dist/mixitup.min.js"></script>

    <!-- Sal.js -->
    <script src="sal-master/dist/sal.js"></script>

    <!-- JS -->
    <script src="js/script.js?ts=<?=time()?>"></script>
</body>
</html>