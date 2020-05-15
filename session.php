<?php
session_start();
$_SESSION["fullname"]=$_POST['fullname'];
$_SESSION["email"]=$_POST['email'];
$_SESSION["product"]=$_POST['product'];
$_SESSION["ordernumber"]=$_POST['ordernumber']; 
$_SESSION["verification"]="verified";
header("Location: review.php");
      ?>