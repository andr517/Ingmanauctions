<?php
require("header.php");
require("partials/nav.php");
checklogin();

if(isset($_GET['prodid']) && $_GET['prodid'] > 0 ){
$productData = getproductdata($connection,$_GET['prodid']);
}
if(isset($_POST['productbidid']) && $_POST['productbidid'] > 0 ){
echo "hello" . $_POST['productbidid'];
$bidData = saveBid($connection,$_POST['bidAmount'],$_POST['productbidid']);
//header("Location: product.php?prodid=".$_POST['isbid']);
}
?>
