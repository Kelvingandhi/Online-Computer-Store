<?php 
require_once 'DB_connect.php';
session_start();
echo ($_SESSION['login_user']);

$user_email = $_SESSION['login_user'];
$cust_id = $_SESSION['user_id'];
echo ($cust_id);

if (isset($_POST["btn_place_order"])){

	//Set appropriate cart id
	$qry = "select MAX(CARTID) as CARTID from cart";

    $res = mysqli_query($conn,$qry);
            
            if(mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_array($res)) {
                	$cart_id=(int)$row['CARTID']+1;
                	echo($cart_id);
                }
            }
            else{
            	$cart_id = 1;
            	echo($cart_id);
            }


	//Add entry to cart table
	$saname = trim($_POST['addr_label']); // get posted data and remove whitespace
    
    $card_no = trim($_POST['card_value']);
    
    $tstatus = "Processing";

    $now = date('m/d/Y', time());
	
    echo ($now);

    $query = "INSERT INTO cart (CARTID,CID,SANAME,CCNUMBER,TSTATUS,TDATE) VALUES('$cart_id','$cust_id', '$saname', '$card_no', '$tstatus', STR_TO_DATE('$now', '%d/%m/%Y'))";

    	echo($query);

  		mysqli_query($conn, $query);





  	//Insert values to appears_in table

    foreach ($_SESSION["cart"] as $keys => $value){
                
		$PID = $value["product_id"];
		$quantity = $value["item_quantity"];
		$sold_price = $value["product_price"];

		$appearsin_query = "INSERT INTO apperars_in (CARTID,PID,QUANTITY,PRICESOLD) VALUES('$cart_id','$PID','$quantity','$sold_price')";

		echo($appearsin_query);

  		
		mysqli_query($conn, $appearsin_query);


	}


	echo '<script>alert("Your order has been Placed")</script>';

	header("Location: laptop.php");
	//exit;
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
				<td>	<label for="email">Select Card</label></td>
				<td>	
					<select class="input" name="card_value" value="Credit Cards">

					<?php
		            $query = "SELECT * FROM stored_card where CID='$cust_id'";
		            $result = mysqli_query($conn,$query);
		            if(mysqli_num_rows($result) > 0) {

		                while ($row = mysqli_fetch_array($result)) {

                    ?>

	  					<option name="card_value" value="<?php echo $row["CCNUMBER"]; ?>"><?php echo $row["CCNUMBER"]; ?></option>
	  					<?php
	                }
	            }
	        ?>
				</select>
				</td>
				</div>
			</tr>
				
			<tr>
				<div class="group">
				<td>	<label for="first">Select Shipping Address</label></td>
				<td>	

					<select class="input" name="addr_label">

					<?php
		            $query = "SELECT * FROM shipping_address where CID='$cust_id'";
		            $result = mysqli_query($conn,$query);
		            if(mysqli_num_rows($result) > 0) {

		                while ($row = mysqli_fetch_array($result)) {

                    ?>

	  					<option name="addr_label" value="<?php echo $row["SANAME"]; ?>"><?php echo $row["SANAME"]; ?>
	  					</option>

	  					
	  					<?php
	                }
	            }
	        ?>
				</select>

				</td>
				</div>
			</tr>
			
			<tr>	
				<div class="group">
				<td>	<input type="submit" class="button" value="Place Order" name="btn_place_order" onclick="window.open('profile.php', '_blank';location.reload();"></td>
				</div>
			</tr>
		</table>
		
	</div>

</form>
</body>
</html>

<?php include("footer.php"); ?>