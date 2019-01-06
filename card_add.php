<?php
    require_once 'DB_connect.php';
	session_start();
	echo ($_SESSION['login_user']);

    $item_id=$_GET['id'];
    $user_id=$_SESSION['user_id'];
    $add_to_cart_query="insert into cart(user_id,item_id,status) values ('$user_id','$item_id','Added to cart')";
    $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
    header('location: products.php');
?>