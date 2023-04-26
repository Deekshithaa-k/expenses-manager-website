<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "mini_project";
$conn = mysqli_connect($host,$user,$pass,$dbname);

if(!$conn){
	echo "DB CONNECTION FAILED!";
}

?>