
<?php 
require_once 'DB_connect.php';
session_start();
echo ($_SESSION['login_user']);


$user_email = $_SESSION['login_user'];

?>

<?php include("header.php"); ?>

<html>
<head>
</head>

<body>

	<div class="container" style="width: 65%">


		<?php
            $query = "SELECT * FROM customer where EMAIL='$user_email'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col-md-3">

						<h2>Hello <?php echo $row["FNAME"]; ?></h2>

					</div>

			<?php
                }
            }
        ?>

	</div>

	<div>
		<div style="margin-top: 1em; margin-left:5em;">
		<button type="submit" name="add_addr" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add shipping address">
        	<a href=add_ship_address.php?ship_addr style="color: #ffffff;">Add Shipping Address</a>
    	</button>
	</div>

	<div>
		<div style="margin-top: 1em; margin-left:5em;">
		<button type="submit" name="add_card" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add credit card">
        	<a href=add_credit_card.php style="color: #ffffff;">Add Credit Card</a>
    	</button>
	</div>

	<div>
		<div style="margin-top: 1em; margin-left:5em;">
	</div>

</body>

</html>

<?php include("footer.php"); ?>