<?php
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
<?php
          if(isset($_POST['save']))
{
  $saveProduct = saveProduct($connection);
}

?>

<form action="account.php" method="post">
<label id="first"> Product name:</label><br/>
 <div class="control">
<input class="input" type="text" name="productName"><br/>

<button class="button is-dark" type="submit" name="save">save</button>
</div>
</form>


        </div>
      </div>
      <div class="is-divider" data-content="OR"></div>
    </section>

  </body>

</html>
