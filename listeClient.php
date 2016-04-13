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

 $qry = mysqli_query($conn,"SELECT * from client ORDER BY CodeCl ASC");
    $data = array();
    while($rows = mysqli_fetch_array($qry))
    {
        $data[] = array(
                    "CodeCl"            => $rows['CodeCl'],
                    "NomCl"            => $rows['NomCl'],
                    "PrenomCl"         => $rows['PrenomCl'],
                    "AdressCl"             => $rows['AdressCl'],
                    "VilleCl"             => $rows['VilleCl'],
                    "CodePosCl"             => $rows['CodePosCl'],
                    "TelCl1"             => $rows['TelCl1'],
                    "TelCl2"             => $rows['TelCl2'],
                    "FaxCl"             => $rows['FaxCl'],
                    "EmailCl"             => $rows['EmailCl']
                    
                    );
    }
    print_r(json_encode($data));
    return json_encode($data);  
    ?>