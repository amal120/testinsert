<?php
// Connecting to database as mysqli_connect("hostname", "username", "password", "database name");
//$con = mysqli_connect("localhost", "root", "", "employee");


 
$host = "127.0.0.1"; 
$user = "root"; 
$pass = ""; 
$dbname = "bdd";
$con = mysqli_connect($host,$user,$pass, $dbname);
 
if (!$con) {
die('Could not connect: ' . mysql_error());
}
 


?>