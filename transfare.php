<?php

include "database.php";

session_start();


if(!isset($_GET['tranId']))
{
    header("Location:Letter.php?error");
    mysqli_close($con);
    exit();
}

$id = $_GET['tranId'];

$sql = " UPDATE letter SET status = 2 WHERE id = '$id' ";

mysqli_query($con,$sql);

header("Location:Letter.php?success");

mysqli_close($con);

exit();

?>