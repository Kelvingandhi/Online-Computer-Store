<?php 
require_once 'DB_connect.php';
session_start();
echo ($_SESSION['login_user']);


$user_email = $_SESSION['login_user'];


if (isset($_POST['btn_add_address'])) {
    $label = trim($_POST['add_label']); // get posted data and remove whitespace
    $receiver_name = trim($_POST['add_name']);
    $street = trim($_POST['add_street']);
    $city = trim($_POST['add_city']);
    $state = trim($_POST['add_state']);
    $zip = trim($_POST['add_zip']);
    $country = trim($_POST['add_country']);
    
    // hash password with SHA256;
    //$password = hash('sha256', $upass);
    // check email exist or not
    $stmt = $conn->prepare("SELECT SANAME FROM shipping_address WHERE SANAME=?");
    $stmt->bind_param("s", $label);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $count = $result->num_rows;

    if ($count == 0) { // if email is not found add user

    	$qry = "SELECT CID FROM CUSTOMER WHERE EMAIL='$user_email'";
            $res = mysqli_query($conn,$qry);
            if(mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_array($res)) {
                	$cust_id=$row['CID'];
                	echo($row['CID']);
                }
            }


    	$query = "INSERT INTO shipping_address (CID,SANAME,RECIPIENTNAME,STREET,SNUMBER,CITY,STATE,COUNTRY) VALUES('$cust_id','$label', '$receiver_name', '$street', '$zip', '$city', '$state', '$country')";

    		echo($query);

  			mysqli_query($conn, $query);
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
				<td>	<label for="first">Address Label</label></td>
				<td>	<input id="first" type="text" class="input" name="add_label"></td>
				</div>
			</tr>
			<tr>
				<div class="group">
				<td>	<label for="last">Recipient Name</label></td>
				<td>	<input id="last" type="text" class="input" name="add_name"></td>
				</div>
			</tr>
			<tr>
				<div class="group">
				<td>	<label for="email">Street</label></td>
				<td>	<input id="email" type="text" class="input" name="add_street"></td>
				</div>
			</tr>
			<tr>
				<div class="group">
				<td>	<label for="email">City</label></td>
				<td>	<input id="email" type="text" class="input" name="add_city"></td>
				</div>
			</tr>
			<tr>
				<div class="group">
				<td>	<label for="email">State</label></td>
				<td>	<input id="email" type="text" class="input" name="add_state"></td>
				</div>
			</tr>
			<tr>
				<div class="group">
				<td>	<label for="email">ZIP Code</label></td>
				<td>	<input id="email" type="text" class="input" name="add_zip"></td>
				</div>
			</tr>
			<tr>
				<div class="group">
				<td>	<label for="email">Country</label></td>
				<td>	<input id="email" type="text" class="input" name="add_country"></td>
				</div>
			</tr>
			<tr>	
				<div class="group">
				<td>	<input type="submit" class="button" value="Add Address" name="btn_add_address" onclick="window.open('add_ship_address.php', '_blank';location.reload();"></td>
				</div>
			</tr>
		</table>
	</div>

</form>
</body>
</html>

<?php include("footer.php"); ?>