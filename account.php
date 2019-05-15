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
          <h2 class="subtitle is-7">Member Since: <?php echo $_SESSION['trn_date']; ?></h2>
        </div>
        <div class="box">
          <?php
          if(isset($_POST['save'])) {
            $saveProduct = saveProduct($connection);
          }
            $getcategories = getcategories($connection);
            $getproducts = getproducts($connection);
          ?>

          <h2 class="title is-5">Submit new auction</h2>
          <form action="account.php" method="post">

            <label id="first"> Product name:</label><br />
            <div class="field">
              <p class="control has-icons-left">
                <input class="input" type="text" name="productName"><br />
                <span class="icon is-small is-left">
                  <i class="fas fa-box"></i>
                </span>
              </p>
            </div>

            <label id="first"> Product description:</label><br />
            <div class="field">
              <p class="control has-icons-left">
                <!-- <input class="input" type="text" name="productDescription"><br /> -->
                <textarea class="textarea" placeholder="e.g. Hello world" name="productDescription"></textarea>
                <span class="icon is-small is-left">
                  <!-- <i class="fas fa-pen"></i> -->
                </span>
              </p>
            </div>

            <label id="first"> Category:</label><br />
            <div class="field">
              <div class="control">
                <div class="select">
                  <select name="getCat">
                    <?php
                    while ($row = mysqli_fetch_array($getcategories)){
                      echo '<option value="' . $row['categoryId'] . '">' . $row['categoryName'] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <label id="first"> Picture:</label><br />
            <div class="field">
              <p class="control has-icons-left">
                <input class="input" placeholder="URL" type="text" name="pictureUrl"><br />
                <span class="icon is-small is-left">
                  <i class="far fa-image"></i>
                </span>
              </p>
            </div>
            <label id="first"> Asking price:</label><br />
            <div class="field">
              <p class="control has-icons-left">
                <input class="input" type="text" name="askingPrice"><br />
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
        <div class="box">
          <h2 class="title is-4">Active listings</h2>
        </div>

          <div class="box">
            <?php while ($row = mysqli_fetch_array($getproducts)){ ?>
               <p class="panel-heading">

                 <?php echo $row['productName']; ?>

               </p>
          <?php } ?>
          </div>


      </div>

    </section>

  </body>

</html>
