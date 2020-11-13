<!--Check if user is signed out-->

<?php
session_start();

if(!isset($_SESSION["email"])){
  //redirect user to sign-in page if signed out
  header("Location: sign-in.php");
  exit(); }

?>
