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

{
    $data = json_decode(file_get_contents("php://input")); 
    $codeproduit        = $data->codeproduit;
    $libelle       = $data->libelle;
    $prixrevient     = $data->prixrevient;
    $prixvente         = $data->prixvente;
    $tva         = $data->tva;
    $fodec         = $data->fodec;
    $stock         = $data->stock;
    $stockalerte         = $data->stockalerte;
    $piece        = $data->piece;
   // print_r($data);
    
    $qry = "UPDATE produit set libelle='".$libelle."' , prixrevient='".$prixrevient."', prixvente=".$prixvente.",tva=".$tva.",fodec=".$fodec.",stock=".$stock.",stockalerte=".$stockalerte.",piece=".$piece." WHERE codeproduit=".$codeproduit;
  
    $qry_res = mysqli_query($qry);
    if ($qry_res) {
        $arr = array('msg' => "Produit Updated Successfully!!!", 'error' => '');
        $jsn = json_encode($arr);
        // print_r($jsn);
    } else {
        $arr = array('msg' => "", 'error' => 'Error In Updating record');
        $jsn = json_encode($arr);
        // print_r($jsn);
    }
}

mysqli_close($conn);
?>
 