<?php
session_start();
 
unset($_SESSION["id"]);
unset($_SESSION["name"]);
unset($_SESSION["roles"]);
 
// Redirect to the login page
header("location: ../../../index.php");
exit;
?>