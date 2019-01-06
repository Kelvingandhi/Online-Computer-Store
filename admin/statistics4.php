<?php 
require_once '..\DB_connect.php';
session_start();
echo ($_SESSION['login_user']);


$user_email = $_SESSION['login_user'];


?>

<?php include("admin_header.php"); ?>

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
	
    <div class="container" style="width: 65%; margin-top:3em;">

    <form action="" method="POST">

        <table>
            <tr>
                <div class="group">
                <td>    <label for="email">Start Date</label></td>
                <td>    <input id="email" type="text" class="input" name="start_date"></td>
                </div>
            </tr>

            <tr>
                <div class="group">
                <td>    <label for="email">End Date</label></td>
                <td>    <input id="email" type="text" class="input" name="end_date"></td>
                </div>
            </tr>

            <tr>    
                <div class="group">
                <td>    <input type="submit" class="btn btn-success" value="GO" name="btn_go" onclick="window.open('statistics1.php', '_blank';location.reload();"></td>
                </div>
            </tr>
        </table>
    
</form>

</div>


	<div class="container" style="width: 65%; margin-top:3em;">

		<?php

            if(isset($_POST['btn_go'])){
                    $start_date = trim($_POST['start_date']);
                    $end_date = trim($_POST['end_date']);

                    echo($start_date);
                    echo($end_date);
    

            $query = "SELECT SNUMBER AS ZIP,COUNT(CARTID) FROM CART JOIN SHIPPING_ADDRESS ON CART.CID=SHIPPING_ADDRESS.CID AND CART.SANAME=SHIPPING_ADDRESS.SANAME AND CART.TDATE BETWEEN '$start_date' AND '$end_date' GROUP BY SNUMBER ORDER BY COUNT(CARTID) DESC LIMIT 5";

            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0) {
            	?>
            	<table border='1' cellpadding='1' cellspacing='0' class='table table-bordered'>

                    	<tr>
                    		<th>ZIP CODE</th>
                    		<th>NO OF SHIPMENTS</th>
                    	</tr>
                <?php
                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    
                    	<tr>
                    		<td><?php echo($row['ZIP']) ?></td>
                    		<td><?php echo($row['COUNT(CARTID)']) ?></td>
                    	</tr>

                    	<?php
                }?>

                    </table>
                    <?php
                }
            
        }
        

        else
        {
            ?>
            <table border='1' cellpadding='1' cellspacing='0' class='table table-bordered'>
                        <tr>
                            <th>ZIP CODE</th>
                            <th>NO OF SHIPMENTS</th>
                        </tr>
            </table>
        <?php
        }
        ?>

	</div>
</body>
</html>

<?php include("admin_footer.php"); ?>