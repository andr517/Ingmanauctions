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
  $pictureUrl = escapeInsert($con, $_POST["pictureUrl"]);
  $productDescription = escapeInsert($con, $_POST["productDescription"]);
  $query = "INSERT INTO products (productName,productUserId,askingPrice,productCatId,productDescription,pictureUrl)VALUES ('$productName','$userid','$askingPrice','$productCatId','$productDescription','$pictureUrl')";
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
  $query = "SELECT * FROM products INNER JOIN category ON category.categoryId = products.productCatId";
  $result = mysqli_query($con, $query) or die('connection');
  return $result;
}

function getproductdata($conn,$productId){
    $query = "SELECT * FROM products WHERE productId=".$productId;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $row = mysqli_fetch_assoc($result);

    return $row;
}

$_SESSION['id'] = $id;

function saveBid($con,$bidid,$bid){
  $query = "INSERT INTO bid(bidProductPId,bidProductUId,bidAmount) VALUES('$bidid','$id','$bidAmount')";
}

?>
