<?php

include "database.php";

session_start();

$arLetters = '\x{0621}-\x{063A}\x{0641}-\x{064A}';

if(!isset($_POST['submit']))
{
    header("Location:Profile.php");
    mysqli_close($con);
    exit();
}
else
{

    $id = $_SESSION['id'];
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    

// check name has no number or no special char
$arLetters = '\x{0621}-\x{063A}\x{0641}-\x{064A}';
if(!preg_match('/^[a-zA-Z\s]+$/', $name) && !preg_match("/^[$arLetters\s]+$/u", $name))
{
    header("Location:Profile.php?errorInName");
    mysqli_close($con);
    exit();
}

// check user email duplicate
$sqlEmail = " SELECT * FROM customer where email = '$email' AND id <> '$id' ";
$resultEmail = mysqli_query($con,$sqlEmail);

if($email == "admin@ksu.com")
{
  header("Location:Profile.php?errorInEmailDuplicate");
  mysqli_close($con);
  exit();
}

if(mysqli_num_rows($resultEmail) > 0)
{
    header("Location:Profile.php?errorInEmailDuplicate");
    mysqli_close($con);
    exit();
}

// check phone length
$lenghtOfPhone = strlen($phone);

if($lenghtOfPhone != 10)
{
    header("Location:Profile.php?errorInPhone");
    mysqli_close($con);
    exit();
}
if(!preg_match('/^[0-9]+$/', $phone))
{
    header("Location:Profile.php?errorInPhone");
    mysqli_close($con);
    exit();
}

    if(!empty($_POST['password']) && !empty($_POST['cpassword']))
    {
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        // check password length
        $lengthOfPassword = strlen($password);

        if($lengthOfPassword < 3)
        {
            header("Location:Profile.php?errorInPassword");
            mysqli_close($con);
            exit();
        }
        if($password != $cpassword)
        {
            header("Location:Profile.php?notCompatable");
            mysqli_close($con);
            exit();
        }
        else
        {
            $hashedPassword = password_hash($password,PASSWORD_DEFAULT);

            $sql = " UPDATE customer SET name = '$name' , email = '$email' , phone = '$phone' , password = '$hashedPassword' WHERE id = '$id'  ";

            mysqli_query($con,$sql);

            header("Location:Profile.php?success");

            mysqli_close($con);

            exit();
        }
    }


$sql = " UPDATE customer SET name = '$name' , email = '$email' , phone = '$phone' WHERE id = '$id'  ";

mysqli_query($con,$sql);

header("Location:Profile.php?success");

mysqli_close($con);

exit();

}

?>