<?php
require("partials/functions.php");
require("header.php");
require("partials/nav.php");
checklogin();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <section class="section">
    <div class="container">
      <div class="box">
      <h2 class="title is-4">Welcome <?php echo ucfirst($_SESSION['username']); ?>!</h2>
    </div>
  </div>
    <div class="is-divider" data-content="OR"></div>
   </section>

  </body>
</html>
