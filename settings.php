<?php
    require 'includes/common.php';
    if (!isset($_SESSION['email'])) { 
       header('location: index.php');     
   }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css" > 
        <title>Setting | Life Style Store</title>
    </head>
    <body>
        <?php
        include 'includes/header.php'
        ?>
        <div class="container-fluid" id="content">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4" id="settings-container">
                    <h4>Change Password</h4>
                    <form action="settings_script.php" method="post">
                        <div class="form-group">
                            <input type="password" class="form-control" name="oldpassword"  placeholder="Old Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="newpassword" placeholder="New Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="newpasswordre"  placeholder="Re-type New Password" required>
                        </div>
                        <h4>
                        <?php
                            if(isset($_GET['message'])){
                                  echo $_GET['message'];
                            }  
                        ?>
                        </h4>
                        <button type="submit" class="btn btn-primary">Change</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
          include 'includes/footer.php';
        ?>
    </body>
</html>
