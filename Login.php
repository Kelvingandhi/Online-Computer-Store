<?php

	session_start();

	require_once 'DB_connect.php';

	// if session is set direct to index
	//if (isset($_SESSION['user'])) {
    //	header("Location: index.php");
    //	exit;
	//}

	if(isset($_SESSION['login_user']))
	{
		if($_SESSION['login_user']=="admin@gmail.com")
		{
			header("location: admin/Home.php");	
		}
		else
			{
			header("location: index.php");	}
	}


	//Login Code

	if(isset($_POST['btn-login'])){
		if(empty($_POST['email'] || empty($_POST['pass']))){
			$error = "Email or password is not valid";
		}
		else
		{
			$email = $_POST['email'];
			$pass = $_POST['pass'];

			// To protect MySQL injection for Security purpose
			/*$email = stripslashes($email);
			$pass = stripslashes($pass);
			$email = mysql_real_escape_string($email);
			$pass = mysql_real_escape_string($pass);*/

			$query = "select * from CUSTOMER where EMAIL = '$email' and PASSWORD = '$pass'";

			$result = mysqli_query($conn,$query);
			$rowdata = mysqli_fetch_array($result);
			$rows = mysqli_num_rows($result);
			echo("Number of rows: ".$rows);
			//$row = mysqli_fetch_array($result);
			//$count = $row->num_rows;
			//echo("\n".$count);

			if($rows == 1){
				$_SESSION['login_user']=$email; // Initializing Session
				$_SESSION['user_name']=$rowdata[1];
          		$_SESSION['user_id'] = $rowdata[0];
          		if($rowdata[0]=='4')
         		{
         			header("location: admin/Home.php");
         		}
         		else{
					header("location: index.php"); // Redirecting To Other Page
				}
			}
			else {
				$error = "Username or Password is invalid";
			}

		}
	}


	//Registration Code
	if (isset($_POST['btn-signup'])) {
    $fname = trim($_POST['reg_fname']); // get posted data and remove whitespace
    $lname = trim($_POST['reg_lname']);
    $email = trim($_POST['reg_email']);
    $upass = trim($_POST['reg_pass']);
    $address = trim($_POST['reg_address']);
    $status = trim($_POST['reg_status']);
    $phone = trim($_POST['reg_phone']);
    // hash password with SHA256;
    //$password = hash('sha256', $upass);
    // check email exist or not
    $stmt = $conn->prepare("SELECT email FROM CUSTOMER WHERE EMAIL=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $count = $result->num_rows;

    echo($status);
    if ($count == 0) { // if email is not found add user

    	$query = "INSERT INTO CUSTOMER (FNAME,LNAME,EMAIL,PASSWORD,ADDRESS,PHONE,STATUS) VALUES('$fname', '$lname', '$email', '$upass', '$address', '$phone','$status')";

    		echo($query);

  			mysqli_query($conn, $query);

  			/*$stmts = $conn->prepare("INSERT INTO CUSTOMER(FNAME,LNAME,CUST_STATUS,EMAIL,PASS,ADDRESS,PHONE) VALUES(?, ?, ?, ?, ?, ?, ?)");
        	$stmts->bind_param("sss", $uname, $email, $password);
        	$res = $stmts->execute();//get result
        	$stmts->close();*/

  			//$_SESSION['login_user']=$email; // Initializing Session
			//header("location: index.php"); // Redirecting To Other Page


/*
        $stmts = $conn->prepare("INSERT INTO CUSTOMER(FNAME,LNAME,CUST_STATUS,EMAIL,PASS,ADDRESS,PHONE) VALUES(?, ?, ?, ?, ?, ?, ?)");
        $stmts->bind_param($fname, $lname, $status, $email, $password, $address, $phone);
        $res = $stmts->execute();//get result
        $stmts->close();
        $user_id = mysqli_insert_id($conn);
        if ($user_id > 0) {
            $_SESSION['user'] = $user_id; // set session and redirect to index page
            if (isset($_SESSION['user'])) {
                print_r($_SESSION);
                header("Location: index.php");
                exit;
            }
        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again";
        }*/
    } else {
        $errTyp = "warning";
        $errMSG = "Email is already used";
    }
}


?>


<!DOCTYPE HTML>

<html>
<head>
	<link href="style/login.css" rel="stylesheet" type="text/css">
</head>

<body>

	<form action="" method="POST">

	<div class="login-wrap">
	<div class="login-html" style="padding:20px 70px 50px 70px;">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" name="email">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="pass">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In" name="btn-login">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
			</div>
			<div class="sign-up-htm">
				<div class="group">
					<label for="first" class="label">First Name</label>
					<input id="first" type="text" class="input" name="reg_fname">
				</div>
				<div class="group">
					<label for="last" class="label">Last Name</label>
					<input id="last" type="text" class="input" name="reg_lname">
				</div>
				<div class="group">
					<label for="email" class="label">Email</label>
					<input id="email" type="text" class="input" name="reg_email">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="reg_pass">
				</div>
				<div class="group">
					<label for="conpass" class="label">Repeat Password</label>
					<input id="conpass" type="password" class="input" data-type="password" name="reg_conpass">
				</div>
				<div class="group">
					<label for="address" class="label">Address</label>
					<input id="address" type="text" class="input" name="reg_address">
				</div>
				<div class="group">
				<label for="status" class="label">Status</label>
				<select class="input" name="reg_status">
  					<option value="regular">Regular</option>
  					<option value="silver">Silver</option>
  					<option value="gold">Gold</option>
  					<option value="platinum">Platinum</option>
				</select>
				</div>
				<div class="group">
					<label for="phone" class="label">Phone Number</label>
					<input id="phone" type="text" class="input" name="reg_phone">
				</div>
				
				<div class="group">
					<input type="submit" class="button" value="Sign Up" name="btn-signup">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</form>

</body>
</html>