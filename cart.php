<?php
require 'includes/common.php';
if (!isset($_SESSION['email']))
  { 
    header('location: index.php');
   }   
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
        <div class="container-fluid" id="content">
        <?php 
        require 'includes/header.php';
        ?>
        <div class="col-md-4 col-md-offset-4">
        <table class="table table-hover table-responsive ">
            <?php
            $user_id= $_SESSION['user_id'];

            $fetch_query = "SELECT items.price AS Price, items.id, items.name AS Name FROM users_items INNER JOIN items ON users_items.item_id = items.id WHERE users_items.user_id='$user_id' and status='Added to cart'";
            $fetch_result = mysqli_query($con, $fetch_query) or die(mysqli_error($con));
            if(mysqli_num_rows($fetch_result)==0){
            echo 'Add item to cart first!';}
            else{
            $sum=0;
            ?>
            <thead>
            <tr>
            <th>Item Number</th>
            <th>Item Name</th>
            <th>Price</th>
            <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_array($result)) {
            $sum+= $row["Price"];
            $id .= $row["id"] . ", ";
            echo "<tr><td>" . "#" . $row["id"] . "</td><td>" . $row["Name"] . "</td><td>Rs " . $row["Price"] . "</td><td><a href='cart-remove.php?id={$row['id']}' class='remove_item_link'> Remove</a></td></tr>";
            }
            $id = rtrim($id, ", ");
            echo "<tr><td></td><td>Total</td><td>Rs " . $sum . "</td><td><a href='success.php?itemsid=" . $id . "' class='btn btn-primary'>Confirm Order</a></td></tr>";
            ?>
            </tbody>
            <?php } ?>
        </table>
        </div>    
    </div>
        <?php 
        require 'includes/footer.php';
        ?>    
    </body>
</html>