<?php
require 'includes/common.php';
if (!isset($_SESSION['email']))
  { 
    header('location: index.php');
   }
$user_id = $_SESSION['user_id'];
$item_ids = $_GET['itemsid'];
$update_query = "UPDATE users_items SET status='Confirmed' where item_id IN ($item_ids) and user_id=$user_id and status='Added to cart' ";
$update_result = mysqli_query($con, $update_query) or die(mysqli_error($con));   
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="index.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Lifestyle Store</title>
    </head>
    <body>
        <?php
        require 'includes/header.php';
        ?>
        <div class="jumbotron col-md-4 col-md-offset-4">
            <p> Your order is confirmed. Thank you for shopping with us.
                <a href="products.php"> Click here</a> to purchase any other item.</p>
        </div>
           
        <?php
        require 'includes/footer.php';
        ?>
    </body>
</html>
