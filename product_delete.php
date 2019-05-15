<?php
require("header.php");
require("partials/nav.php");
checklogin();

if(isset($_GET['deleteid']) && $_GET['deleteid'] > 0 ){
    $isDeleteid = $_GET['deleteid'];
}

// Skall kunden raderas?
if(isset($_POST['isdeleteid']) && $_POST['isdeleteid'] > 0){
    deleteCustomer($connection,$_POST['isdeleteid']);

    // Skickar tillbaka till sidan som visar alla kunder
    header("Location: customer_read.php");
}

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>

   </body>
 </html>
