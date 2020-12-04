<?php

$servername="localhost";
$email="root";
$password="";
$dbname="kimmy_Chu";
$name="";


 $conn = new mysqli("localhost","root","","kimmy_Chu");
 if($conn->connect_error){
 	die("Connection Failed!".$conn->connect_error);
 }
?>