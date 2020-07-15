<?php

include "database.php";

session_start();

if(!isset($_GET['cardId']) || empty($_GET['cardId']))
{
    header("Location:Home.php");
    mysqli_close($con);
    exit();
}
else
{
    $cardId = $_GET['cardId'];

    $sql = " UPDATE card SET status = 0 WHERE id = '$cardId' ";

    mysqli_query($con,$sql);

    header("Location:purchasedCard.php");

    mysqli_close($con);

    exit();

}

?>