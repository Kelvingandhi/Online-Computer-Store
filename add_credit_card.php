<?php 
require_once 'DB_connect.php';
session_start();
echo ($_SESSION['login_user']);


$user_email = $_SESSION['login_user'];


if (isset($_POST['btn_add_card'])) {
    $owner = trim($_POST['add_owner_name']); // get posted data and remove whitespace
    $card_no = trim($_POST['add_cardno']);
    $sec_no = trim($_POST['add_sec']);
    $card_type = trim($_POST['add_type']);
    $address = trim($_POST['add_addr']);
    $date1 = trim($_POST['add_date']);
    $newdt = '01/'.$date1;
	//$exp_date = date('m-d-Y',$newdt);


    $timestamp = date('m-d-Y', strtotime($date1));

    echo($timestamp);

	//$ymd = DateTime::createFromFormat('m/d/Y', '$date1')->format('m/Y');

	//echo $newdt;
    
    // hash password with SHA256;
    //$password = hash('sha256', $upass);
    // check email exist or not
    
    $stmt = $conn->prepare("SELECT CCNUMBER FROM credit_card WHERE CCNUMBER=?");
    $stmt->bind_param("s", $card_no);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $count = $result->num_rows;

    if ($count == 0) { // if email is not found add user

    	$query = "INSERT INTO credit_card (CCNUMBER,SECNUMBER,OWNERNAME,CCTYPE,CCADDRESS,EXPDATE) VALUES('$card_no','$sec_no', '$owner', '$card_type', '$address', STR_TO_DATE('$newdt', '%d/%m/%Y'))";

    		echo($query);

  			mysqli_query($conn, $query);

  			//Insert to stored card
  			$qry = "SELECT CID FROM CUSTOMER WHERE EMAIL='$user_email'";
            $res = mysqli_query($conn,$qry);
            if(mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_array($res)) {
                	$cust_id=$row['CID'];
                	echo($row['CID']);
                }
            }

            $query1 = "INSERT INTO stored_card values('$card_no','$cust_id')";

            echo($query1);

  			mysqli_query($conn, $query1);
			


  		} else {
        $errTyp = "warning";
        $errMSG = "Email is already used";

    }
    
}


?>

<?php include("header.php"); ?>

<html>

<head>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


	<style>
		.product{
            border: 1px solid #eaeaec;
            margin: 35px 19px 3px 35px;
            padding: 10px;
            text-align: center;
            /*background-color: #efefef;*/
            color: "black";
        }
	</style>
</head>

<body>

	<form action="" method="POST">

	<div class="product" style="margin-left: 30em; margin-top:5em; margin-bottom: 15em;">
		<table>
			<tr>
				<div class="group">
				<td>	<label for="email">Owner Name</label></td>
				<td>	<input id="email" type="text" class="input" name="add_owner_name"></td>
				</div>
			</tr>
			<tr>
				<div class="group">
				<td>	<label for="first">Card Number</label></td>
				<td>	<input id="first" type="text" class="input" name="add_cardno"></td>
				</div>
			</tr>
			<tr>
				<div class="group">
				<td>	<label for="last">Security Code</label></td>
				<td>	<input id="last" type="text" class="input" name="add_sec"></td>
				</div>
			</tr>
			<tr>
				<div class="group">
				<td>	<label for="email">Card type</label></td>
				<td>	<input id="email" type="text" class="input" name="add_type"></td>
				</div>
			</tr>
			<tr>
				<div class="group">
				<td>	<label for="email">Billing Address</label></td>
				<td>	<input id="email" type="text" class="input" name="add_addr"></td>
				</div>
			</tr>
			<tr>
				<div class="group">
				<td>	<label for="email">Expiry Date</label></td>
				<td>	<input id="email" type="text" class="input" name="add_date"></td>
				</div>
			</tr>
			<tr>	
				<div class="group">
				<td>	<input type="submit" class="button" value="Add Credit Card" name="btn_add_card" onclick="window.open('add_credit_card.php', '_blank';location.reload();"></td>
				</div>
			</tr>
		</table>
	</div>

</form>
</body>
</html>

<?php include("footer.php"); ?>