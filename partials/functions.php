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
    $query = "SELECT * FROM products INNER JOIN users ON users.id = products.productUserId
    INNER JOIN category ON category.categoryId = products.productCatId
    WHERE productId=".$productId;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $row = mysqli_fetch_assoc($result);

    return $row;
}

function deleteCustomer($conn,$customerId){
    $query = "DELETE FROM products WHERE productId=". $customerId;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");
}

function saveBid($conn,$bidAmount,$prodId){
  $productData = getproductdata($conn,$prodId);
  $userid = $_SESSION["id"];
  $bidAmount = escapeInsert($conn,$_POST['bidAmount']);
  if ($bidAmount > $productData['askingPrice']) {
    $query = "INSERT INTO bid (bidAmount,bidProductPId,bidProductUId )VALUES ('$bidAmount','$prodId','$userid')";
    $result = mysqli_query($conn,$query) or die("Query failed: $query");
  }
}

function getBid($con){
  $query = "SELECT * FROM bid INNER JOIN users ON users.id = bid.bidProductUId
  INNER JOIN products ON products.productId = bid.bidProductPId";
  $result = mysqli_query($con, $query) or die('connection');
  return $result;
}

function updateCustomer($conn){
    $img = escapeInsert($conn,$_POST['txtimg']);
    $title = escapeInsert($conn,$_POST['txttitle']);
    $price = escapeInsert($conn,$_POST['price']);
    $cat = escapeInsert($conn,$_POST['getCat']);
    $des = escapeInsert($conn,$_POST['txtdes']);
    $editid = $_POST['updateid'];

    $query = "UPDATE products
			SET pictureUrl='$img', productName='$title', askingPrice='$price', productCatId='$cat', productDescription='$des'
			WHERE productId=". $editid;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");
}

// API functions
function getproductsApi($conn){
  $query = "SELECT * FROM products INNER JOIN category ON category.categoryId = products.productCatId";
  $result = mysqli_query($con, $query) or die('connection');
  $row = mysqli_fetch_all($result);
  return $row;
}
?>
