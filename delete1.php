<?php 
$data = json_decode(file_get_contents("php://input"));     
    $codeproduit = $data->codeproduit;     
    //print_r($data)   ;
    $del = mysqli_query($conn,"DELETE FROM produit WHERE codeproduit = 10);
    if($del)
    return true;
    return false;
    }
      
    ?>