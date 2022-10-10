<?php 

$dbServerName = "localhost";
$userName = "root";
$password = "";
$dbName = "bookstallprojectdemo";

$conn = mysqli_connect($dbServerName, $userName, $password, $dbName);
if (!$conn) {
	die("connection failed: ".mysqli_connect_error());//to show the connection error
}

 ?>