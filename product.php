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
<?php
if(isset($_GET['prodid']) && $_GET['prodid'] > 0 ){
	$productData = getproductdata($connection,$_GET['prodid']);
}
if(isset($_POST['isbid']) && $_POST['isbid'] > 0 ){
	$bidData = saveBid($connection,$_POST['isbid']);
}
 ?>
 <div id="center" class="section">
<div class="container">

  <div class="tile is-ancestor">
    <div class="tile is-parent">
      <div class="tile is-child box is-11">
        <figure class="image is-3by2">
          <img src="<?php echo $productData['pictureUrl']; ?>" alt="Placeholder image">
        </figure>
      </div>
    </div>
    <div class="tile is-vertical is-parent">
      <div class="tile is-child box">
        <p class="title is-4"><?php echo $productData['productName']; ?></p>

        <form action="product.php" method="post">
          <input type="hidden" name="isbid" value="<?php $productData['productId'] ?>">
          <div class="field">
            <p class="control has-icons-left">
              <input class="input" type="text" name="bid" style="width:200px;"><br />
              <span class="icon is-small is-left">
                <i class="fas fa-money-bill-wave"></i>
              </span>
            </p>
          </div>
          <div class="field">
            <p class="control">
              <button class="button is-dark" type="submit" name="bidAmount">Bid</button>
            </p>
          </div>
        </form>

      </div>
      <div class="tile is-child box">
        <p class="text"><?php echo $productData['productDescription']; ?></p>
        <p></p>
      </div>
    </div>

  </div>

</div>
</div>

   </body>
 </html>
