<?php
session_start();

$connection = dbconfig();

function checklogin(){
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
}

function dbconfig(){
  $connection = mysqli_connect("localhost","root","","phplabb2");
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    return $connection;
}

function saveProduct($con){
  $userid = $_SESSION["id"];
  $productName = escapeInsert($con, $_POST["productName"]);
  $askingPrice = escapeInsert($con, $_POST["askingPrice"]);
  $productCatId = escapeInsert($con, $_POST["getCat"]);
  $query = "INSERT INTO products (productName,productUserId,askingPrice,productCatId)VALUES ('$productName','$userid','$askingPrice','$productCatId')";
  $result = mysqli_query($con, $query) or die('connection');
  $insId = mysqli_insert_id($con);
  return $insId;
}

function escapeInsert($con, $insert){
    $insert = htmlspecialchars($insert);
    $insert = mysqli_real_escape_string($con, $insert);
    return $insert;
}

function dbDisconnect($connection){
    mysqli_close($connection);
}

function getcategories($con){
  $query = "SELECT * FROM category";
  $result = mysqli_query($con, $query) or die('connection');
  return $result;
}

function getproducts($con){
  $query = "SELECT * FROM products";
  $result = mysqli_query($con, $query) or die('connection');
  return $result;
}

?>
