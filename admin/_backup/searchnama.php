<?php  require "config.php";
$searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = mysql_query ("SELECT * FROM barang WHERE nm_brg LIKE '%".$searchTerm."%' ORDER BY nm_brg ASC");
    while ($row=mysql_fetch_array($query)) {
        $data[] = $row['nm_brg'];
    }
    
    //return json data
    echo json_encode($data);?>