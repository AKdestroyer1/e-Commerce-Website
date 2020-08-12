<?php
require 'includes/common.php';
$email = $_POST['e-mail'];
$email = mysqli_real_escape_string($con, $email);

$password = $_POST['password'];
$password = mysqli_real_escape_string($con, $password);
if (strlen($password) < 6) {
  header('location: signup.php?password_error=enter correct password');
}
$password = md5($password);
$contact = $_POST['contact'];
$contact = mysqli_real_escape_string($con, $contact);

$city = $_POST['city'];
$city = mysqli_real_escape_string($con, $city);

$address = $_POST['address'];
$address = mysqli_real_escape_string($con, $address);

$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
if (!preg_match($regex_email, $email)) {
  $m = "<span class='red'>Enter a valid email</span>";
    header('location: signup.php?m1=' . $m);
}
$regex_num = "/^[789][0-9]{9}$/";
if (!preg_match($regex_num, $contact)) {
  $m = "<span class='red'>Not a valid phone number</span>";
    header('location: signup.php?m2=' . $m);
}
$fetch_query = "select id from users WHERE email='$email'";
$fetch_result = mysqli_query($con, $fetch_query) or die(mysqli_error($con));
if(mysqli_num_rows($fetch_result))
{ $m = "<span class='red'>Email Already Exists</span>";
  header('location: signup.php?m1=' . $m);}
else{
    $insert_query = "insert into users values($name, $email, $password, $contact, $city, $address ";
    $insert_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
    $_SESSION['email'] = $email;
    $_SESSION['user_id'] = mysqli_insert_id($con);
    header('location: products.php');
    }
       
?>

