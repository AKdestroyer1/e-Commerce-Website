<?php
require 'includes/common.php';
$email = $_POST['e-mail'];
$email = mysqli_real_escape_string($con, $email);
$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
if (!preg_match($regex_email, $email)) {
  header('location: login.php?email_error=enter correct email');
}
$password = $_POST['password'];
$password = mysqli_real_escape_string($con, $password);
if (strlen($password) < 6) {
  header('location: login.php?password_error=enter correct password');
}
$password = md5($password);

$fetch_query = "SELECT id, email FROM users WHERE email='" . $email . "' AND password='" . $password . "'";
$fetch_result = mysqli_query($con, $fetch_query) or die(mysqli_error($con));
if(mysqli_num_rows($fetch_result)==0)
{$error = "<span class='red'>Please enter correct E-mail id and Password</span>";
 header('location: login.php?error=' . $error);}
else{
    $row = mysqli_fetch_array($fetch_result);
    $_SESSION['email'] = $row['email'];
    $_SESSION['user_id'] = $row['id'];
    header('location: products.php');
    }
       
?>

