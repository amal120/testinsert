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

 $qry = mysqli_query($conn,"SELECT * from fournisseur ORDER BY codefr ASC");
    $data = array();
    while($rows = mysqli_fetch_array($qry))
    {
        $data[] = array(
                    "codefr"            => $rows['codefr'],
                    "nomfr"            => $rows['nomfr'],
                    "prenomfr"         => $rows['prenomfr'],
                    "adressefr"             => $rows['adressefr'],
                    "villefr"             => $rows['villefr'],
                    "codepostalefr"             => $rows['codepostalefr'],
                    "tel"             => $rows['tel'],
                    "fax"             => $rows['fax'],
                    "activite"             => $rows['activite']

                    
                    
                    );
    }
    print_r(json_encode($data));
    return json_encode($data);  
    ?>