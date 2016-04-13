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
    $codeproduit = $data->codeproduit; 
    $qry = mysqli_query($conn,'SELECT * from produit WHERE codeproduit='.$codeproduit);
    $data = array();
    while($rows = mysqli_fetch_array($qry))
    {
        $data[] = array(
                   "codeproduit"            => $rows['codeproduit'],
                    "libelle"            => $rows['libelle'],
                    "prixrevient"         => $rows['prixrevient'],
                    "prixvente"             => $rows['prixvente'],
                    "tva"             => $rows['tva'],
                    "fodec"             => $rows['fodec'],
                    "stock"             => $rows['stock'],
                    "stockalerte"             => $rows['stockalerte'],
                    "piece"             => $rows['piece']
                    );
    }
    print_r(json_encode($data));
    return json_encode($data);  
}

mysqli_close($conn);
?>
