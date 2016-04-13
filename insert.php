<?php
// Including database connections
require_once 'database_connections.php';
// Fetching and decoding the inserted data
$data = json_decode(file_get_contents("php://input")); 
// Escaping special characters from submitting data & storing in new variables.
$data    = json_decode(file_get_contents("php://input"));
$mat     = $data->mat;
$nom     = $data->nom;
$classe  = $data->Classe;
$n1      = $data->n1;
$n2      = $data->n2;
$n3      = $data->n3;
$c1      = $data->c1;
$c2      = $data->c2;
$c3      = $data->c3;
$sql = "Insert into etudiant (mat,nom,classe) values('$mat','$nom','$classe')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

echo true;

?>