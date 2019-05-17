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
$getbid = getBid($connection);
if(isset($_GET['prodid']) && $_GET['prodid'] > 0 ){
	$productData = getproductdata($connection,$_GET['prodid']);
}
    if(isset($_POST['productbidid']) && $_POST['productbidid'] > 0 ){
    $bidData = saveBid($connection,$_POST['bidAmount'],$_POST['productbidid']);
    header("Location: product.php?prodid=".$_POST['productbidid']);
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
              <p class="title is-4">
                <?php echo $productData['productName']; ?>
              </p>
              <form action="product.php" method="post">
                <input type="hidden" name="productbidid" value="<?php echo $productData['productId']; ?>">
                <div class="field">
                  <p class="control has-icons-left">
                    <input class="input" type="text" name="bidAmount" style="width:200px;">
                    <button class="button is-dark" type="submit" name="isbid">Bid</button>
                    <span class="icon is-small is-left">
                      <i class="fas fa-money-bill-wave"></i>
                    </span>
                  </p>
                </form>
                  <p class="text">Posted by user:
                    <?php echo ucfirst($productData['username']); ?>
                  </p>
                  <p>Starting bid: $
                    <?php echo $productData['askingPrice']; ?>
                  </p>
                  <p>Category:
                    <?php echo $productData['categoryName']; ?>
                  </p>
                  <p>
                    <?php while($row = mysqli_fetch_array($getbid)){
                      if ($row['bidProductPId'] == $productData['productId']) { ?>
                        <p>Bidder: <?php echo ucfirst($row['username'])?>
                          <span class="has-text-success">$<?php echo $row['bidAmount']; ?></span>
                        </p>

                    <?php
                      }
                      }
                     ?>
                  </p>
                </div>


            </div>
            <div class="tile is-child box">
              <p class="text">
                <?php echo $productData['productDescription']; ?>
              </p>
              <p></p>
            </div>
          </div>

        </div>

      </div>
    </div>

  </body>

</html>
