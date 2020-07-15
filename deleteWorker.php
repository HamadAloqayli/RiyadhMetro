<?php

include "database.php";

session_start();

if(!isset($_GET['dWorker']))
{
    header('Location:Worker.php');
    exit();
}


$delWor = $_GET['dWorker'];

$sql = " DELETE FROM customer_support WHERE id = '$delWor' ";

mysqli_query($con,$sql);

header("Location:Worker.php?successD");

mysqli_close($con);

exit();

?>