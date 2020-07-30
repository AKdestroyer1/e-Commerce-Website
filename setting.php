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
        <?php 
        require 'includes/header.php';
        ?>
        <div class="container-fluid">
        <div class="row">
        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                    <h2>Change Password</h2>
                    <form method="POST" action="settings_script.php">
                       <div class="form-group">
                       <input type="password" class="form-control" placeholder="Old Password" name="oldpassword"  required = "true">
                       </div>
                       <div class="form-group">
                       <input type="password" class="form-control"  placeholder="New Password"  name="newpassword" required = "true">
                       <?php
                        echo "<br><br><b class='red'>" . $_GET['password_error'] . "</b>";
                        ?>
                       </div>
                       <div class="form-group">
                       <input type="password" class="form-control" placeholder="Password" name="renewpassword" required = "true">
                       </div>
                       <button type="submit" name="change" class="btn btn-primary">Change</button>
                       <?php
                       echo "<br><br><b class='red'>" . $_GET['error'] . "</b>";
                       ?>
                    </form>
        </div>
        </div>
        </div>    
        <?php 
        require 'includes/footer.php';
        ?>
    </body>
</html>