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
          if(isset($_POST['save'])) {
            $saveProduct = saveProduct($connection);
          }
            $getcategories = getcategories($connection);
          ?>

<form action="account.php" method="post">

<label id="first"> Product name:</label><br/>
<div class="field">
  <p class="control has-icons-left">
    <input class="input" type="text" name="productName"><br/>
    <span class="icon is-small is-left">
      <i class="fas fa-box"></i>
    </span>
  </p>
</div>

<label id="first"> Category:</label><br/>
<div class="field">
<div class="control">
  <div class="select">
    <select>
      <?php
      while ($row = mysqli_fetch_array($getcategories)) {
        echo '<option>Select dropdown</option>';
        echo $row['categoryName'];
      }
       ?>
    </select>
  </div>
</div>
</div>
<label id="first"> Asking price:</label><br/>
<div class="field">
  <p class="control has-icons-left">
    <input class="input" type="text" name="productName"><br/>
    <span class="icon is-small is-left">
      <i class="fas fa-dollar-sign"></i>
    </span>
  </p>
</div>

<div class="field">
  <p class="control">
    <button class="button is-dark" type="submit" name="save">save</button>
  </p>
</div>
</form>


        </div>
      </div>
      <div class="is-divider" data-content="OR"></div>
    </section>

  </body>

</html>
