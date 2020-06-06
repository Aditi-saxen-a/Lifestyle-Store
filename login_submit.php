<?php
    require 'includes/common.php';
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $regex_email = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3})$";
    if (!preg_match($regex_email, $email)) {
        header('location: login.php?email_error=enter correct email');
    }   
    $password =mysqli_real_escape_string($con, $_POST['password']);
    if (strlen($password) < 6) {
        header('location: login.php?password_error=enter correct password');
    }
    $password=md5($password);
    $select_query="SELECT id,email FROM users WHERE email='$email' and password='$password'";
    $select_query_result=mysqli_query($con, $select_query) or die(mysqli_error($con));
    $total_rows_fetched = mysqli_num_rows($select_query_result);
    if($total_rows_fetched!=0){
        $row = mysqli_fetch_array($select_query_result);
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $row['id'];
        header('location: products.php');
    }
    else{  
        $error = "<span class='red'>Invalid Credentials</span>";
        header('location: login.php?message='.$error);
    }
?>

