<?php

$servername="localhost";
$email="root";
$password="";
$dbname="kimmy_chu";
$name="";


 $conn = new mysqli("localhost","root","","kimmy_chu");
 if($conn->connect_error){
 	die("Connection Failed!".$conn->connect_error);
 }
?>