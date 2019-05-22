<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
require('../partials/functions.php');

// Skapar databaskopplingen
$connection = dbconfig();

if(isset($_POST['productName'])){
    $name = $_POST['productName'];
}else{
    echo "Ingen tillåten post (productName)";
    exit;
}
if(isset($_POST['askingPrice'])){
    $email = $_POST['askingPrice'];
}else{
    echo "Ingen tillåten post (askingPrice)";
    exit;
}
if(isset($_POST['getCat'])){
    $email = $_POST['getCat'];
}else{
    echo "Ingen tillåten post (getCat)";
    exit;
}
if(isset($_POST['pictureUrl'])){
    $email = $_POST['pictureUrl'];
}else{
    echo "Ingen tillåten post (pictureUrl)";
    exit;
}
if(isset($_POST['productDescription'])){
    $email = $_POST['productDescription'];
}else{
    echo "Ingen tillåten post (productDescription)";
    exit;
}

$saveProduct = saveProductApi($connection);

if(isset($saveProduct) && $saveProduct > 0 ) {
    $productData = getproductdataApi($connection, $saveProduct);

    $output = $productData;

    echo json_encode($output);
}

// Stänger databaskopplingen
dbDisconnect($connection);
?>
