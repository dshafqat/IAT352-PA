<!-- Check if user is logged in-->

<?php
session_start();

if(isset($_SESSION["email"])){

  //redirect to logged in page
  header("Location: product-info.php");
  exit(); }

?>
