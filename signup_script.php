<?php
    require 'includes/common.php';
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $regex_name="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$";
    if (!preg_match($regex_name, $name)) {
        $error="Enter correct name";
        header('location: signup.php?message='.$error);
    } 
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $regex_email="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3})$";
    if (!preg_match($regex_email, $email)) {
        $error="Enter valid email";
        header('location: signup.php?message='.$error);
    } 
    $password =mysqli_real_escape_string($con, $_POST['password']);
    if (strlen($password) < 6) {
        $error="Password length should be greater than 6";
        header('location: signup.php?message='.$error);
    }
    $password=md5($password);
    $contact = $_POST['contact'];
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $select_query="SELECT id FROM users WHERE email='$email'";
    $select_query_result=mysqli_query($con, $select_query);
    $total_rows_fetched = mysqli_num_rows($select_query_result);
    if($total_rows_fetched>0){
        $error = "<span class='red'>Email Already Exists. Please login to continue.</span>";
        header("location: signup.php?message=".$error);
    }
    else{
    $user_registration_query = "insert into users(name, email, password, contact, city, address) values ('$name', '$email', '$password', '$contact', '$city', '$address')";
    $user_submit_query=mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
    $_SESSION['id'] = mysqli_insert_id($con);
    $_SESSION['email_id'] = $email;
    header("location: products.php");
    
    }
    
?>

