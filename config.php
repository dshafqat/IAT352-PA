<?php

$servername="localhost";
$email="root";
$password="";
$dbname="KIMMY_CHU";
$name="";


 $conn = new mysqli("localhost","root","","Kimmy_Chu");
 if($conn->connect_error){
 	die("Connection Failed!".$conn->connect_error);
 }
?>