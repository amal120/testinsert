<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "bdd";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$data = json_decode(file_get_contents("php://input")); 

$mat     = $data->mat;
$nom     = $data->nom;
$classe     = $data->classe;
$n1         = $data->n1;
$n2         = $data->n2;
$n3         = $data->n3;
$c1         = $data->c1;
$c2         = $data->c2;
$c3         = $data->c3;

$sql = "INSERT INTO etudiant (mat, nom,classe,n1,n2,n3,c1,c2,c3) VALUES ('$mat','$nom','$classe',$n1,$n2,$n3,$c1,$c2,$c3)";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
