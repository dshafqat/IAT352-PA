<?php

$servername="localhost";
$email="root";
$password="";
$dbname="KIMMY_CHU";


 $conn = new mysqli("localhost","root","","KIMMY_CHU");
 if($conn->connect_error){
 	die("Connection Failed!".$conn->connect_error);
 }
?>