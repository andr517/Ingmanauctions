<?php
require("header.php");
require("partials/nav.php");
checklogin();
$getproducts = getproducts($connection);
?>

<body>
  <section class="section">
    <div class="container">
      <div class="columns is-multiline">
        <?php
      while ($row = mysqli_fetch_array($getproducts)){ ?>

        <div id="productitem" class="column is-4">
          <div class="card">
            <a class="productlink" href="product.php?prodid=<?php echo $row['productId']; ?>">
              <div class="card-image">
                <figure class="image is-3by2">
                  <img src="<?php echo $row['pictureUrl']; ?>" alt="Placeholder image">
                </figure>
              </div>
              <div class="card-content">
                <div class="media">
                  <div class="media-left">
                  </div>
                  <div class="media-content">
                    <p class="title is-4">
                      <?php echo $row['productName']; ?>
                    </p>
                    <p class="subtitle is-6">Starting bid <span class="has-text-success">
                      $<?php echo $row['askingPrice']; ?></span></p>
                  </div>
                </div>

                <div class="content">
                  <p class="text"><span class="category">
                      <?php echo $row['categoryName']; ?></span></p>
                  <p class="text is-size-7">Posted:
                    <?php echo $row['created_at']; ?>
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>

        <?php } ?>
      </div>
    </div>
  </section>
</body>


<?php require('footer.php'); ?>
