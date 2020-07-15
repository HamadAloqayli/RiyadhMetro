<?php

include "database.php";

session_start();

date_default_timezone_set('Asia/Riyadh');

$arLetters = '\x{0621}-\x{063A}\x{0641}-\x{064A}';

// check if admin did not submit
if(!isset($_POST['submit']))
{
    header("Location:Worker.php?errorInSubmit");
    mysqli_close($con);
    exit();
}
else
{
    $name = mysqli_real_escape_string($con,$_POST['nameAdd']);
    $email = mysqli_real_escape_string($con,$_POST['emailAdd']);
    $pass = mysqli_real_escape_string($con,$_POST['passwordAdd']);

// check user email duplicate
$sqlEmail = " SELECT * FROM customer where email = '$email'";
$resultEmail = mysqli_query($con,$sqlEmail);

// check employee email duplicate
$sqlEmailE = " SELECT * FROM customer_support where email = '$email'";
$resultEmailE = mysqli_query($con,$sqlEmailE);

if($email == "admin@ksu.com")
{
    header("Location:Worker.php?errorInEmailDuplicate");
    mysqli_close($con);
    exit();
}
if(mysqli_num_rows($resultEmail) > 0 || mysqli_num_rows($resultEmailE) > 0)
{
    header("Location:Worker.php?errorInEmailDuplicate");
    mysqli_close($con);
    exit();
}
// check password length
$lengthOfPassword = strlen($pass);

    if($lengthOfPassword < 3)
    {
        header("Location:Worker.php?errorInPassword");
        mysqli_close($con);
        exit();
    }

    $hashedPassword = password_hash($pass,PASSWORD_DEFAULT);

    $sql = " INSERT INTO customer_support(name,email,password,rating) VALUES('$name','$email','$hashedPassword',0) ";
    
    mysqli_query($con,$sql);
    header("Location:Worker.php?success");
    mysqli_close($con);
    exit();
    
}
    
?>