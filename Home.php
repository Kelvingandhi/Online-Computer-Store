<?php

session_start();
//include('DB_connect.php');

echo ($_SESSION['login_user']);

if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit;
}


$server = "localhost";
$username = "root";
$password = "";
$database = "android_db";

$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn){
	die("Can't connect".mysql_error());
}
echo("Connected Successfully\n");


$qry = "select * from android_versions";

$result = mysqli_query($conn,$qry);


$androidArray = array();

while($row = mysqli_fetch_array($result)){

	array_push($androidArray,array('version_name'=>$row['version_name'],'api_level'=>$row['api_level'],'image_path'=>$row['image_path']));

}

echo json_encode($androidArray);

mysqli_close($conn);
?>

<html>
<body>
	<li >
            
        <ul>
		    <li>
		    <b id="logout">	<a href="logout.php?logout"><span ></span>Logout</a> </b>
            </li>
        </ul>
    </li>
</body>
</html>