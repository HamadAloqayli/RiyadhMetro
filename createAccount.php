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

if(!isset($_POST['submit']))
{
    header("Location:Register.php?errorInRegister");
    mysqli_close($con);
    exit();
}
else
{
$name = mysqli_real_escape_string($con,$_POST['name']);
$email1 = mysqli_real_escape_string($con,$_POST['email1']);
$email2 = mysqli_real_escape_string($con,$_POST['email2']);
$password1 = mysqli_real_escape_string($con,$_POST['password1']);
$password2 = mysqli_real_escape_string($con,$_POST['password2']);
$phone = mysqli_real_escape_string($con,$_POST['phone']);

// check name has no number or no special char
$arLetters = '\x{0621}-\x{063A}\x{0641}-\x{064A}';
if(!preg_match('/^[a-zA-Z\s]+$/', $name) && !preg_match("/^[$arLetters\s]+$/u", $name))
{
    header("Location:Register.php?errorInName");
    mysqli_close($con);
    exit();
}

// check user email duplicate
$sqlEmail = " SELECT * FROM customer where email = '$email1'";
$resultEmail = mysqli_query($con,$sqlEmail);

// check employee email duplicate
$sqlEmailE = " SELECT * FROM customer_support where email = '$email1'";
$resultEmailE = mysqli_query($con,$sqlEmailE);

if($email1 == "admin@ksu.com")
{
  header("Location:Register.php?errorInEmailDuplicate=".$email1);
  mysqli_close($con);
  exit();
}

if(mysqli_num_rows($resultEmail) > 0 || mysqli_num_rows($resultEmailE) > 0)
{
    header("Location:Register.php?errorInEmailDuplicate=".$email1);
    mysqli_close($con);
    exit();
}

// check email compatibility
if($email1 !== $email2)
{
    header("Location:Register.php?errorInEmailCompatibility=".$email1);
    mysqli_close($con);
    exit();
}

// check password length
$lengthOfPassword = strlen($password1);

    if($lengthOfPassword < 3)
    {
        header("Location:Register.php?errorInPassword");
        mysqli_close($con);
        exit();
    }

// check password compatibility for Register
if($password1 !== $password2)
{
    header("Location:Register.php?errorInPasswordCompatibility");
    mysqli_close($con);
    exit();
}

// check phone length
$lenghtOfPhone = strlen($phone);

if($lenghtOfPhone != 10)
{
    header("Location:Register.php?errorInPhoneLength");
    mysqli_close($con);
    exit();
}
if(!preg_match('/^[0-9]+$/', $phone))
{
    header("Location:Register.php?errorInPhoneNumber");
    mysqli_close($con);
    exit();
}


$hashedPassword = password_hash($password1,PASSWORD_DEFAULT);

$date = date("Y-m-d");

$sql = " INSERT INTO customer(name,email,password,phone,date) VALUES('$name','$email1','$hashedPassword','$phone','$date') ";

mysqli_query($con,$sql);
header("Location:Register.php?success");
mysqli_close($con);
exit();

}



?>