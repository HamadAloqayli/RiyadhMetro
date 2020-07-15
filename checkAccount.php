<?php

session_start();

if(isset($_SESSION['numPaths']))
{

  $_SESSION['numPaths'] = "";
  $_SESSION['class'] = "";
  $_SESSION['price'] = "";

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

include "database.php";

date_default_timezone_set('Asia/Riyadh');

//LogOut
if (isset($_SESSION['id'])) {
    

    header("Location:Home.php");
    mysqli_close($con);
    session_destroy();
    exit();

}

//LogIn
if(!isset($_POST['submit']))
{
    header("Location:Register.php?errorInRegister");
    mysqli_close($con);
    session_destroy();
    exit();
}
else
{
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    // find user in database
    $sql = " SELECT * FROM customer WHERE email = '$email' ";
    $result = mysqli_query($con,$sql);
    // find employee in database
    $sqlE = " SELECT * FROM customer_support WHERE email = '$email' ";
    $resultE = mysqli_query($con,$sqlE);
        // find admin in database
        $sqlA = " SELECT * FROM admin WHERE email = '$email' ";
        $resultA = mysqli_query($con,$sqlA);

    // check whether user or employee has account or not
    if(mysqli_num_rows($result) <= 0 && mysqli_num_rows($resultE) <= 0 && mysqli_num_rows($resultA) <= 0)
        {
            header("Location:Register.php?errorInLogin");
            mysqli_close($con);
            session_destroy();
            exit();
        }
        else
        {
            // check whether user password is correct
            if(mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_assoc($result);

                if(!(password_verify($password,$row['password'])))
                {
                    header("Location:Register.php?errorInLogin");
                    mysqli_close($con);
                    session_destroy();
                    exit();
                }
            
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['phone'] = $row['phone'];

                    
                    header("Location:Home.php?successU");
                    mysqli_close($con);
                    exit();
            }
            // check whether employee password is correct
            else if(mysqli_num_rows($resultE) > 0)
            {
                $rowE = mysqli_fetch_assoc($resultE);

                if(!(password_verify($password,$rowE['password'])))
                {
                    header("Location:Register.php?errorInLogin");
                    mysqli_close($con);
                    session_destroy();
                    exit();
                }
            
                    $_SESSION['id'] = $rowE['id'];
                    $_SESSION['name'] = $rowE['name'];
                    $_SESSION['email'] = $rowE['email'];
                    $_SESSION['rating'] = $rowE['rating'];

                    
                    header("Location:Home.php?successE");
                    mysqli_close($con);
                    exit();
            }
                        // check whether admin password is correct
                        else if(mysqli_num_rows($resultA) > 0)
                        {
                            $rowA = mysqli_fetch_assoc($resultA);
            
                            if(!(password_verify($password,$rowA['password'])))
                            {
                                header("Location:Register.php?errorInLogin");
                                mysqli_close($con);
                                session_destroy();
                                exit();
                            }
                        
                                $_SESSION['id'] = $rowA['id'];
                                $_SESSION['name'] = $rowA['name'];
                                $_SESSION['email'] = $rowA['email'];

                                
                                header("Location:Home.php?successA");
                                mysqli_close($con);
                                exit();
                        }
        }
   

} 


?>