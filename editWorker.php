<?php

include "database.php";

session_start();

$arLetters = '\x{0621}-\x{063A}\x{0641}-\x{064A}';

if(!isset($_POST['submit']))
{
    header("Location:Worker.php?errorInSubmitE");
    mysqli_close($con);
    exit();
}
else
{
    $id = $_POST['idEdit'];
    $name = mysqli_real_escape_string($con,$_POST['nameEdit']);
    $email = mysqli_real_escape_string($con,$_POST['emailEdit']);


$sql = " UPDATE customer_support SET name = '$name' , email = '$email' WHERE id = '$id'  ";

mysqli_query($con,$sql);

header("Location:Worker.php?successE");

mysqli_close($con);

exit();

}

?>