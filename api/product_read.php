<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
require('../partials/functions.php');

// Skapar databaskopplingen
$connection = dbconfig();

if(isset($_GET['prodid']) && $_GET['prodid'] > 0 ){
    $productData = getproductdataApi($connection,$_GET['prodid']);
}else{
    echo "Inget giltligt ID";
}

$output = $productData;

echo json_encode($output);

// Stänger databaskopplingen
dbDisconnect($connection);
?>
