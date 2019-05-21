<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
require('partials/functions.php');

$connection = dbconfig();

// Visar alla kunder
$allProducts = getproductsApi($connection);

$output = $allProducts;

echo json_encode($output);

// Stänger databaskopplingen
dbDisconnect($connection);
?>
