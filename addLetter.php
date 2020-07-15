<?php

include "database.php";

session_start();

date_default_timezone_set('Asia/Riyadh');


if(!isset($_POST['submit']))
{
    header("Location:Letter.php?error");
    mysqli_close($con);
    exit();
}
if(empty($_POST['title']) || empty($_POST['text']))
{
  header("Location:Letter.php?error");
  mysqli_close($con);
  exit();
}
if(strlen($_POST['title']) > 9000 || strlen($_POST['text']) > 9000)
{
  header("Location:Letter.php?error");
  mysqli_close($con);
  exit();
}

$title = $_POST['title'];
$text = $_POST['text'];
$date = date('Y-m-d');
$status = 0;
$role = $_POST['role'];
$senderId = $_POST['senderId'];
$customerRole = $_POST['customer_role'];
$customerId = $_POST['customer_id'];

if($role == "customer")
{
  $sql = " INSERT INTO letter(title,text,date,sender,sender_id,customer_id,status) VALUES('$title','$text','$date','$role','$senderId',0,1) ";

  mysqli_query($con,$sql);
  
  header("Location:Letter.php?success");
  
  mysqli_close($con);
  
  exit();
}
else if($role == "cs")
{
  if(isset($customerRole) && $customerRole == "customer")
  {
    $sql = " INSERT INTO letter(title,text,date,sender,sender_id,customer_id,status) VALUES('$title','$text','$date','customer support','$senderId','$customerId',0) ";
  }
  else
  {    
    $sql = " INSERT INTO letter(title,text,date,sender,sender_id,customer_id,status) VALUES('$title','$text','$date','customer support','$senderId',0,2) ";
  }

  mysqli_query($con,$sql);
  
  header("Location:Letter.php?success");
  
  mysqli_close($con);
  
  exit();
}
else
{
  if(isset($customerRole) && $customerRole == "customer")
  {
    $sql = " INSERT INTO letter(title,text,date,sender,sender_id,customer_id,status) VALUES('$title','$text','$date','$role','$senderId','$customerId',0) ";
  }
  else
  {
  $sql = " INSERT INTO letter(title,text,date,sender,sender_id,customer_id,status) VALUES('$title','$text','$date','$role','$senderId',0,1) ";
  }
  mysqli_query($con,$sql);
  
  header("Location:Letter.php?success");
  
  mysqli_close($con);
  
  exit();
}

?>