<?php 
session_start();

$_SESSION['username'] = null;
$_SESSION['email'] = null;
$_SESSION['password'] = null;
header("Location: ../index.php");
$_SESSION['admin_username'] = null;
$_SESSION['admin_email'] = null;
$_SESSION['admin_password'] = null;
header("Location: ../index.php");


?>