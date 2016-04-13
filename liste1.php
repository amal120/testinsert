<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "bdd";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

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
    ?>