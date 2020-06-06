<?php
require "includes/common.php";
if (!isset($_SESSION['email'])) { 
       header('location: index.php');     
}
$oldpassword=md5($_POST['oldpassword']);
$newpassword=md5($_POST['newpassword']);
$newpasswordre=md5($_POST['newpasswordre']);
$email = $_SESSION['email'];
$select_query = "SELECT * FROM users WHERE email = '$email' AND password = '$oldpassword'";
$select_query_result = mysqli_query($con , $select_query) or die(mysqli_error($con));
$rows = mysqli_num_rows($select_query_result);
if ($newpassword===$newpasswordre && $rows>0){
    $success = "<span class='green'>Password Changed</span>";
    $update_query = "UPDATE users SET password = '$newpassword' WHERE email = '$email'";
    $update_query_result = mysqli_query($con , $update_query) or die(mysqli_error($con));
    header("location:settings.php?message=".$success);
}
elseif($newpassword===$newpasswordre){
    $invalid = "<span class='red'>Please enter correct password !</span>";
    header("location:settings.php?message=".$invalid);
}
else{
    $error="Please enter the same  new password !";
    header('location:settings.php?message='.$error);
}
?>

