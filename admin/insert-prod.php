<?php 
require_once '..\DB_connect.php';
session_start();
echo ($_SESSION['login_user']);


$user_email = $_SESSION['login_user'];




?>

<?php include("admin_header.php"); ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Let's Shop</title>
  <meta name="description" content="Description of your site goes here">
  <meta name="keywords" content="keyword1, keyword2, keyword3">
  <link href="../css/style.css" rel="stylesheet" type="text/css">
  <SCRIPT> 	
	function show(select_item) {
	    if (select_item == "laptop") {
		   // hiddenDiv1.style.visibility='visible';
			hiddenDiv1.style.display='table-cell';
			hiddenDiv2.style.display='table-cell';
			hiddenDiv3.style.display='table-cell';
			hiddenDiv4.style.display='table-cell';
			Form.btype.focus();
		} 
		else if(select_item == "computer") {
			//hiddenDiv2.style.visibility='hidden';
			hiddenDiv5.style.display='table-cell';
			hiddenDiv6.style.display='table-cell';
			hiddenDiv1.style.display='none';
			hiddenDiv2.style.display='none';
			hiddenDiv3.style.display='none';
			hiddenDiv4.style.display='none';
			hiddenDiv7.style.display='none';
			hiddenDiv8.style.display='none';
			hiddenDiv9.style.display='none';
			hiddenDiv10.style.display='none';
		}
		else if(select_item == "printer") {
			//hiddenDiv7.style.visibility='hidden';
			hiddenDiv7.style.display='table-cell';
			hiddenDiv8.style.display='table-cell';
			hiddenDiv9.style.display='table-cell';
			hiddenDiv10.style.display='table-cell';
			hiddenDiv1.style.display='none';
			hiddenDiv2.style.display='none';
			hiddenDiv3.style.display='none';
			hiddenDiv4.style.display='none';
			hiddenDiv5.style.display='none';
			hiddenDiv6.style.display='none';
		}
		else {
			//hiddenDiv1.style.visibility='hidden';
			hiddenDiv1.style.display='none';
			hiddenDiv2.style.display='none';
			hiddenDiv3.style.display='none';
			//hiddenDiv3.style.visibility='hidden';
			hiddenDiv4.style.display='none';
			hiddenDiv5.style.display='none';
			hiddenDiv6.style.display='none';
			hiddenDiv7.style.display='none';
			hiddenDiv8.style.display='none';
			hiddenDiv9.style.display='none';
			hiddenDiv10.style.display='none';
		}
	}	
</SCRIPT> 
</head>
<body>
<div class="main">
<div class="page-out">
<div class="page">
<div class="header">
<div class="header-top">
<form name="insert-prod" method="post" action="">

</div>

</div>
<div class="content">
<div class="left-out">
<div class="left-in">
<div class="left-panel">
<h1 class="title">Welcome To <span>Our Site</span></h1>
<hr/><br/>

<?php
	//session_start();
	if(!isset($_SESSION['login_user']))
	{
		echo "<p>Make sure to login before you buy.<br/>";
		//echo "<a href='login.php'><b> Click here for login </b></a></p>";
		header("location: ../login.php");	
	}
	else
	{
		?>
		<div style="margin-left: 20em; margin-top:1em; margin-bottom: 5em; font-size:1.5em;">
			<?php echo "Welcome <b>" .$_SESSION['user_name']. "</b>";?> 
		</div>
		<?php
	}
	
	
	if(isset($_POST["submit"]))
	{
		$ptype=$_POST["ptype"];
		$pname=$_POST["txtpname"];
		$price=$_POST["txtprice"];
		$description=$_POST["description"];
		$qty=$_POST["txtqty"];
		
		if($ptype=="computer")
		{
			$cputype=$_POST["cputype"];
		}
		if($ptype=="printer")
		{
			$printtype=$_POST["printtype"];
			$resolution=$_POST["resolution"];
		}
		
		
		$sql="insert into PRODUCT (PTYPE,PNAME,PPRICE,PDESCRIPTION,PQUANTITY) values('".$ptype."','".$pname."','".$price."','".$description."','".$qty."')";
		if($ptype=="laptop")
		{
			$btype=$_POST["btype"];
			$weight=$_POST["weight"];
			$sql1="insert into LAPTOP (BTYPE,WEIGHT) values('".$btype."','".$weight."')";
		}
		if($ptype=="computer")
		{
			$cputype=$_POST["cputype"];
			$sql1="insert into COMPUTER (CPUTYPE) values('".$cputype."')";

		}
		if($ptype=="printer")
		{
			$printtype=$_POST["printtype"];
			$resolution=$_POST["resolution"];
			$sql1="insert into PRINTER (PRINTERTYPE,RESOLUTION) values('".$printertype."','".$resolution."')";

		}
		
		$result=mysqli_query($con,$sql);
		$result1=mysqli_query($con,$sql1);
		
	}
if(isset($result) and isset($result1)){
if($result and $result1)
		{
			echo "Product added successfully";
			//header("location:shop.php");
		}
		else
		{
			echo "Something wrong in insert data".mysql_error();
			
		}
	}
	
	if(isset($_POST['logout']))
	{
		session_destroy();
		header("location: ../login.php");	
	}
?>

<div style="margin-left: 20em; margin-top:5em; margin-bottom: 15em;">

<table>
<tr>
<td>Product Type:</td>
<td>
<select name="ptype" onchange="java_script_:show(this.options[this.selectedIndex].value)">
<option value="" selected="selected">Select...</option>
<option value="laptop">Laptop</option>
<option value="computer">Computer</option>
<option value="printer">Printer</option>
</select></td></tr>
<tr>
<td>Product Name:</td>
<td><input type="text" name="txtpname"></td></tr>
<tr>
<td>Price ($):</td>
<td><input type="number" name="txtprice" step="0.01"></td></tr>
<tr>
<td>Description:</td>
<td><textarea name="description"> </textarea> </td></tr>
<tr>
<td>Quantity:</td>
<td><input type="number" name="txtqty"></td></tr>

<tr>
<td id="hiddenDiv1" style="display:none">Battery Type: </td>
<td id="hiddenDiv2" style="display:none"> <input type="text" name="btype"/></td>
<tr>
<td id="hiddenDiv3" style="display:none">Weight (lb):</td>
<td id="hiddenDiv4" style="display:none"><input type="number" name="weight" step="0.01"/></td>
</tr>
</tr>

<tr>
<td id="hiddenDiv5" style="display:none">CPU Type: </td>
<td id="hiddenDiv6" style="display:none"><input type="text" name="cputype"/></td>
</tr>


<tr>
<td id="hiddenDiv7" style="display:none">Printer Type: </td>
<td id="hiddenDiv8" style="display:none"><input type="text" name="printtype"/></td>
</tr>
<tr>
<td id="hiddenDiv9" style="display:none">Resolution: </td>
<td id="hiddenDiv10" style="display:none"><input type="text" name="resolution"/></td>
</tr>

<tr>
<td></td>
<td><input type="submit" name="submit"/></td>
</tr>

</table>

</div>

</div>
</div>
</div>
</div>


</body></html>


<?php include("admin_footer.php"); ?>