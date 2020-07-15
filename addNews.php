<?php

include "database.php";

session_start();

date_default_timezone_set('Asia/Riyadh');

// check if employee did not submit or if submit file has an error or it is empty
if(!isset($_POST['submit']) || $_FILES['image']['error'] != 0 || empty($_FILES['image']['name']))
{
    header("Location:News.php?errorInSubmitOrUpload");
    mysqli_close($con);
    exit();
}

$img = $_FILES['image']['name'];
$target="savedImg/".basename($_FILES['image']['name']);
$title = $_POST['title'];
$text = $_POST['text'];

if(strlen($title) > 5000 || strlen($text) > 5000)
{
    header("Location:News.php?errorInLength");
    mysqli_close($con);
    exit();
}
if(empty($title) || empty($text))
{
    header("Location:News.php?errorInFields");
    mysqli_close($con);
    exit();
}

$sqlEdit = " UPDATE news SET status = 0 WHERE status = 1 ";

mysqli_query($con,$sqlEdit);


$sqlAdd = " INSERT INTO news(image,title,text,status) VALUES('$img','$title','$text',1) ";

mysqli_query($con,$sqlAdd);

move_uploaded_file($_FILES['image']['tmp_name'],$target);

header("Location:News.php?success");

mysqli_close($con);

exit();

?>