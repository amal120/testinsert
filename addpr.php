<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "siteproduits";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$data = json_decode(file_get_contents("php://input")); 

$codeproduit     = $data->codeproduit;
$libelle    = $data->libelle;
$prixrevient     = $data->prixrevient;
$prixvente         = $data->prixvente;
$tva         = $data->tva;
$fodec         = $data->fodec;
$stock       = $data->stock;
$stockalerte       = $data->stockalerte;
$piece      = $data->piece;



$sql = "INSERT INTO produit (codeproduit,libelle,prixrevient,prixvente,tva,fodec,stock,stockalerte,piece) VALUES ('$codeproduit','$libelle','$prixrevient','$prixvente','$tva','$fodec','$stock','$stockalerte','$piece')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
