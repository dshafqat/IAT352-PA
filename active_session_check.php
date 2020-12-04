<!-- Check if user is logged in-->

<?php
session_start();

//check if user is logged in with their email


if(isset($_SESSION["email"])){

  //redirect to logged in page
  header("Location: login_successful.php");
  exit(); }

?>
