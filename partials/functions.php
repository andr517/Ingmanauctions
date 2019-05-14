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
  $query = "INSERT INTO products (productName,productUserId)VALUES ('$productName','$userid')";
  $result = mysqli_query($con, $query) or die('connection');
  $insId = mysqli_insert_id($con);
  return $insId;
}

function escapeInsert($con, $insert)
{
    $insert = htmlspecialchars($insert);
    $insert = mysqli_real_escape_string($con, $insert);
    return $insert;
}

function dbDisconnect($connection)
{
    mysqli_close($connection);
}

function getcategories($con){
  $query = "SELECT * FROM categories";
  $result = mysqli_query($con, $query) or die('connection');
  return $result;
}

?>
