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

$CodeCl     = $data->CodeCl;
$NomCl     = $data->NomCl;
$PrenomCl     = $data->PrenomCl;
$AdressCl         = $data->AdressCl;
$VilleCl         = $data->VilleCl;
$CodePosCl         = $data->CodePosCl;
$TelCl1         = $data->TelCl1;
$TelCl2        = $data->TelCl2;
$FaxCl         = $data->FaxCl;
$EmailCl         = $data->EmailCl;

$sql = "INSERT INTO client (CodeCl,NomCl,PrenomCl,AdressCl,VilleCl,CodePosCl,TelCl1,TelCl2,FaxCl,EmailCl) VALUES ('$CodeCl','$NomCl','$PrenomCl','$AdressCl','$VilleCl','$CodePosCl',$TelCl1,$TelCl2,'$FaxCl','$EmailCl')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
