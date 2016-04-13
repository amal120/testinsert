<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "bdd";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "SELECT * from etudiant ORDER BY mat ASC";
$result = mysqli_query($con, $query);
$arr = array();
if(mysqli_num_rows($result) != 0) {
	while($row = mysqli_fetch_assoc($result)) {
			$arr[] = $row;
	}
}
echo ($arr);
?>
