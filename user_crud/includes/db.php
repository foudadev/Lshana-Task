<?php
// MySQL connection
$dbServer   = "localhost"; 
$dbUser     = "user";
$dbPassword = "Password123#@!";
$database   = "user_crud";

$conn = mysqli_connect($dbServer, $dbUser, $dbPassword, $database) or die('Mysql Connection Error:' . mysqli_connect_error());
