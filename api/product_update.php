<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
require('../partials/functions.php');

// Skapar databaskopplingen
$connection = dbconfig();

if(isset($_POST['txttitle'])){
    $name = $_POST['txttitle'];
}else{
    echo "Ingen tillåten post (productName)";
    exit;
}
if(isset($_POST['price'])){
    $email = $_POST['price'];
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
if(isset($_POST['txtimg'])){
    $email = $_POST['txtimg'];
}else{
    echo "Ingen tillåten post (pictureUrl)";
    exit;
}
if(isset($_POST['txtdes'])){
    $email = $_POST['txtdes'];
}else{
    echo "Ingen tillåten post (productDescription)";
    exit;
}
if(isset($_GET['prodid'])){
    $id = $_GET['prodid'];
}else{
    echo "Ingen tillåten post (productDescription)";
    exit;
}

$updateProduct = updateProductApi($connection);

if(isset($updateProduct) && $updateProduct > 0 ) {
    $productData = getproductdataApi($connection, $updateProduct);

    $output = $productData;

    echo json_encode($output);
}

// Stänger databaskopplingen
dbDisconnect($connection);
?>
