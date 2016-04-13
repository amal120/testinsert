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

include('config.php'); 

/**  Switch Case to Get Action from controller  **/

switch($_GET['action'])  {
    case 'add_produit' :
            add_produit();
            break;

    case 'get_produit' :
            get_produit();
            break;

    case 'edit_produit' :
            edit_produit();
            break;

    case 'delete_produit' :              
            delete_produit();
            break;

    case 'update_produit' :
            update_produit();
            break;
}


/**  Function to Add Student  **/

function add_produit() {
$data = json_decode(file_get_contents("php://input")); 
$codeproduit     = $data->codeproduit;
$libelle     = $data->libelle;
$prixrevient     = $data->prixrevient;
$prixvente         = $data->prixvente;
$tva         = $data->tva;
$fodec         = $data->fodec;
$stock         = $data->stock;
$stockalerte         = $data->stockalerte;
$piece        = $data->piece;
$sql = "INSERT INTO produit (codeproduit, libelle,prixrevient,prixvente,tva,fodec,stock,stockalerte,piece) VALUES ('$codeproduit','$libelle','$prixrevient',$prixvente,$tva,$fodec,$stock,$stockalerte,$piece)";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}


function get_student() {  
$qry = mysqli_query($conn,"SELECT * from etudiant ORDER BY mat ASC");
    $data = array();
    while($rows = mysqli_fetch_array($qry))
    {
        $data[] = array(
                    "mat"            => $rows['mat'],
                    "nom"            => $rows['nom'],
                    "classe"         => $rows['classe'],
                    "n1"             => $rows['n1'],
                    "c1"             => $rows['c1'],
                    "n2"             => $rows['n2'],
                    "c2"             => $rows['c2'],
                    "n3"             => $rows['n3'],
                    "c3"             => $rows['c3']
                    
                    );
    }
    print_r(json_encode($data));
    return json_encode($data);  
 }


/**  Function to Delete Product  **/

function delete_produit() {
    $data = json_decode(file_get_contents("php://input"));     
    $mat = $data->produit_index;     
    //print_r($data)   ;
    $del = mysqli_query($conn,"DELETE FROM produit WHERE codeproduit = ".$codeproduit);
    if($del)
    return true;
    return false;     
}


/**  Function to Edit Product  **/

function edit_produit() {
    $data = json_decode(file_get_contents("php://input"));     
    $mat = $data->produit_index; 
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


/** Function to Update Product **/

function update_student() {
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

?>