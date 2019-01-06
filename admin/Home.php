<?php 
require_once '..\DB_connect.php';
session_start();
echo ($_SESSION['login_user']);


$user_email = $_SESSION['login_user'];

if (isset($_POST["delete_prod"])){

  $prod_id =$_GET['id'];

  $qry1 = "delete from product where PID='$prod_id'";
  echo($qry1);

  mysqli_query($conn, $qry1);

}


?>

<?php include("admin_header.php"); ?>

<html>
<head>
  <meta charset="UTF-8">
  <title>Let's Shop</title>
  <meta name="description" content="Description of your site goes here">
  <meta name="keywords" content="keyword1, keyword2, keyword3">
  <link href="admin_style.css" rel="stylesheet" type="text/css">

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

<h1>LeT's ShoP</h1>




<h1 class="title">Welcome To <span>Our Site</span></h1>
<hr/><br/>

<div class="container" style="width: 65%">

<div class="table-responsive">

<?php
	
$sql = "SELECT * FROM product";
if($result = mysqli_query($conn, $sql)){
	echo(mysqli_num_rows($result));
    if(mysqli_num_rows($result) > 0){
        echo "<table border='1' cellpadding='1' cellspacing='0' class='table table-bordered'>";
            echo "<tr>";
            	echo "<th>Delete</th>";
                echo "<th>Product ID</th>";
                echo "<th>ProductType</th>";
                echo "<th>Name</th>";
                echo "<th>Price</th>";
                echo "<th>Description</th>";
            	echo "<th>Quantity</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
      echo "<form method='POST' action=Home.php?action=modify_item&id=".$row["PID"]. ">";
            echo "<tr>";
            	echo "<td><button type='submit' name='delete_prod' style='margin-top: 5px;'' class='btn btn-success' value='Delete'>Delete</button></td>";
            	echo "<td>" . $row['PID'] . "</td>";
                echo "<td>" . $row['PTYPE'] . "</td>";
                echo "<td>" . $row['PNAME'] . "</td>";
                echo "<td>" . $row['PPRICE'] . "</td>";
                echo "<td>" . $row['PDESCRIPTION'] . "</td>";
                echo "<td>" . $row['PQUANTITY'] . "</td>";
            echo "</tr>";
           echo "</form>";
        }
        echo "</table>";
        
    } else{
        echo "No products found. Please add product.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
	
?>

</div>
</div>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

</body>

</html>


<?php include("admin_footer.php"); ?>