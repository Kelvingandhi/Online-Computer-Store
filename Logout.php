<?php
	
	session_start();

	if(!isset($_SESSION['login_user'])){
		header("Location: Login.php");
	}elseif (isset($_SESSION['login_user']) != "") {
		header("Location: Home.php");
	}

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['login_user']);
		header("Location: Login.php");
		exit;
	}

?>