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
        <title>Success | Life Style Store</title>
    </head>
    <body>
        <?php
        include 'includes/header.php';
        /*
        $item_id= $_GET['ids'];
        $update_status_query = "UPDATE users_items SET status = 'Confirmed' WHERE item_id = '$item_id'";
        $update_status_result = mysqli_query($con, $update_status_query) or die(mysqli_error($con));
        */
        $user_id = $_SESSION["user_id"];
        $query = "SELECT item_id FROM users_items WHERE user_id = '$user_id'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));

        while($row = mysqli_fetch_array($result)){
            $item_id = $row["item_id"];
            $query_update = "UPDATE users_items SET status = 'Confirmed' WHERE item_id = '$item_id'";            
            $result_update = mysqli_query($con, $query_update) or die(mysqli_error($con));
        }
        ?>
        <div class="container-fluid" id="content">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h3 align="center">Your order is confirmed. Thank you for shopping with us.</h3><hr>
                    <p align="center">Click <a href="products.php">here</a> to purchase any other item.</p>
                </div>
            </div>
        </div>
        <?php
          include 'includes/footer.php';
        ?>
    </body>
</html>
