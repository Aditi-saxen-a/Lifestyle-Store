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
        <title>Cart | Life Style Store</title>
    </head>
    <body>
        <div class="container-fluid" id="content">
            <?php
                include 'includes/header.php';
            ?>
             <div class="row decor_bg">
                <div class="col-md-6 col-md-offset-3">
                    <table class="table table-striped">
                        <?php
                        $sum=0;
                        $id='';
                        $user_id=$_SESSION['user_id'];
                        $query="SELECT items.price AS price, items.id, items.name AS name FROM users_items JOIN items ON "
                                ."users_items.item_id=items.id WHERE users_items.user_id='$user_id' AND status='Added to cart'";
                        $result=mysqli_query($con,$query) or die(mysqli_error($con));
                        if(mysqli_num_rows($result)>=1){
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
                            while($row=mysqli_fetch_array($result)){
                                $sum+=$row["price"];
                                $id.=$row["id"].",";
                                echo "<tr><td>"."#".$row["id"]."</td><td>".$row["name"]."</td><td>Rs.".$row["price"]."</td>"
                                        ."<td><a href='cart_remove.php?id={$row['id']}' class='remove_item_link'>Remove"
                                        . "</a></td></tr>";
                            }
                            $id=rtrim($id,",");
                                echo "<tr><td></td><td>Total</td><td>Rs.".$sum."</td><td><a href=success.php?"
                                        . "itemsid=".$id."class='btn btn-primary'>Confirm Order</a></td></tr>";
                            ?>
                        </tbody>
                        <?php
                        } else{
                            echo 'Add items to the cart first!';
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <?php
          include 'includes/footer.php';
        ?>
    </body>
</html>
