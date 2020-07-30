<?php
require 'includes/common.php';
if (isset($_SESSION['email']))
  { header('location: products.php');
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
        <div class="col-xs-4 col-xs-offset-4">
                    <div class="panel panel-primary panel-heading panel-footer" >
                        <div class="panel-heading">
                            <h4>LOGIN</h4>
                        </div>
                        <div class="panel-body">
                            <p class="text-warning">Login to make a purchase</p>
                            <form method="POST" action="login_submit.php">
                                <div class="form-group">
                                    <input type="text" class="form-control"  placeholder="Email" name="e-mail" required = "true">
                                    <div><?php echo $_GET['email_error']; ?></div>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password" required = "true">
                                    <div><?php echo $_GET['password_error']; ?></div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Login</button><br><br>
                                <?php echo $_GET['error']; ?>
                            </form><br/>
                        </div>
                        <div class="panel-footer"><p>Don't have an account? <a href="signup.php">Register</a></p></div>
                    </div>
        </div>   
        </div>
        </div>    
        <?php
        require 'includes/footer.php';
        ?>
    </body>
</html>

