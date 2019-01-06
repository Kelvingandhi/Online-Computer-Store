<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "computer store";

$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn){
	die("Can't connect".mysql_error());
}
echo("Connected Successfully\n");

?>