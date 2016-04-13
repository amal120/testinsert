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

$codefr     = $data->codefr;
$nomfr    = $data->nomfr;
$prenomfr     = $data->prenomfr;
$adressefr         = $data->adressefr;
$villefr         = $data->villefr;
$codepostalefr         = $data->codepostalefr;
$tel        = $data->tel;
$fax       = $data->fax;
$activite       = $data->activite;



$sql = "INSERT INTO fournisseur (codefr,nomfr,prenomfr,adressefr,villefr,codepostalefr,tel,fax,activite) VALUES ('$codefr','$nomfr','$prenomfr','$adressefr','$villefr','$codepostalefr',$tel,$fax,'$activite')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
