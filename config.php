<?php
 $conn = new mysqli("localhost","root","","KIMMY_CHU");
 if($conn->connect_error){
 	die("Connection Failed!".$conn->connect_error);
 }
?>