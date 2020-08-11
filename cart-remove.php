<?php
require 'includes/common.php';
$item_id= $_GET['id'];
$user_id= $_SESSION['user_id']; 
$delete_query = "DELETE from users_items where item_id='$item_id' and user_id='$user_id' ";
$delete_result = mysqli_query($con, $delete_query) or die(mysqli_error($con));
header('location: cart.php');
?>


