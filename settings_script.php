<?php
require 'includes/common.php';
if (!isset($_SESSION['email']))
  { 
    header('location: index.php');
   }
$password = $_POST['password'];
$password = mysqli_real_escape_string($con, $password);
$password = md5($password);

$newpassword = $_POST['newpassword'];
$newpassword = mysqli_real_escape_string($con, $password);

$renewpassword = $_POST['renewpassword'];
$renewpassword = mysqli_real_escape_string($con, $password);
if (strlen($newpassword) < 6) {
  header('location: setting.php?password_error=Enter Correct Password');
}
if ($newpassword != $renewpassword) {
  header('location: setting.php?error=enter matching password');
}
 else {
    $newpassword= md5($newpassword);
}

$fetch_query = "select email,password from users where email='".$_SESSION['email']."' and password='$password'";
$fetch_result = mysqli_query($con, $fetch_query) or die(mysqli_error($con));
if(mysqli_num_rows($fetch_result)){
    $update_query = "UPDATE  users SET password= '$newpassword' where password='$password'";
    $update_result = mysqli_query($con, $update_query) or die(mysqli_error($con));
    header('location: settings.php?error=Password Updated');
    }
 else {
    header('location: setting.php?error= Enter Correct Password');
}
 ?> 