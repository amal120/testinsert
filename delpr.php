
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
    //print_r($data)   ;
    $del = mysqli_query($conn,"DELETE FROM produit WHERE codeproduit = ".$codeproduit);
    if($del)
    return true;
    return false;
    }
      
    ?>