<?php 
require_once 'DB_connect.php';

$qry = "SELECT PNAME FROM product";
$res = mysqli_query($conn,$qry);

 $cnt = mysqli_num_rows($res);
 echo($cnt);

 while ($row = mysqli_fetch_array($res))
 {
 	echo($row['PNAME']);
 }


 //Add to cart button actions

session_start();

 if (isset($_POST["add_item"])){
        if (isset($_SESSION["cart"])){
        	echo("Session is already set");
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                echo("\n".$count);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="laptop.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="laptop.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
             echo($_POST["hidden_price"]);
             	if(isset($_SESSION["cart"]))
             	{
             		echo("Session is set");
             	}
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo("Session unset");
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="laptop.php"</script>';
                }
            }
        }
    }


?>
     


<?php include("header.php"); ?>

<html>

<head>
	<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
    </style>
</head>

<body>
	

	<div class="container" style="width: 65%;margin-top: 1em;">
        
        

        <h2>Shopping Cart</h2>

    	

        <div>
        	<div style="margin-top: 1em">
        <h2>Desktops</h2>
        	</div>
        <div style="margin-top: 1em">

        <?php
            $query = "SELECT * FROM product where PTYPE='Desktop'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col-md-3">

                        <form method="post" action="laptop.php?action=add_item&id=<?php echo $row["PID"]; ?>">

                            <div class="product">
                                <img src="<?php echo $row["IMG"]; ?>" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["PNAME"]; ?></h5>
                                <h5 class="text-danger">$<?php echo $row["PPRICE"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["PNAME"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["PPRICE"]; ?>">
                                <input type="submit" name="add_item" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
        ?>

    </div>
    	</div>

        

    </div>

    <div class="container" style="width: 65%">

    	<div style="margin-top: 1em">
        	<h2>Laptops</h2>

        	<div style="margin-top: 1em">

        	<?php
            $query = "SELECT * FROM product where PTYPE='Laptop'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col-md-3">

                        <form method="post" action="laptop.php?action=add&id=<?php echo $row["PID"]; ?>">

                            <div class="product">
                                <img src="<?php echo $row["IMG"]; ?>" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["PNAME"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["PPRICE"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["PNAME"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["PPRICE"]; ?>">
                                <input type="submit" name="add_item" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
        	?>

    	</div>
    	</div>
	</div>

    <div class="container" style="width: 65%">

    	<div style="margin-top: 1em">
        	<h2>Printers</h2>
        	<div style="margin-top: 1em">
        	<?php
            $query = "SELECT * FROM product where PTYPE='Printer'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col-md-3">

                        <form method="post" action="laptop.php?action=add&id=<?php echo $row["PID"]; ?>">

                            <div class="product">
                                <img src="<?php echo $row["IMG"]; ?>" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["PNAME"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["PPRICE"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["PNAME"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["PPRICE"]; ?>">
                                <input type="submit" name="add_item" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
        	?>

    	</div>
    	</div>
	</div>

	<div class="container" style="width: 65%">

	<div style="clear: both"></div>
        <h3 class="title2">Shopping Cart Details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>$ <?php echo $value["product_price"]; ?></td>
                            <td>
                                $ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                            <td><a href="laptop.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>

                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">$ <?php echo number_format($total, 2); ?></th>
                            <td><button type="submit" name="add_cart" style="margin-top: 5px;" class="btn btn-success"
                                       value="Checkout"><a href=checkout.php style="color: #ffffff;">Checkout</a>
                                   </button></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>

</body>
</html>

<?php include("footer.php"); ?>