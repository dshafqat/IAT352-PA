<?php
 $conn = new mysqli("localhost","root","","bubbletea");
 if($conn->connect_error){
 	die("Connection Failed!".$conn->connect_error);
 }
?>