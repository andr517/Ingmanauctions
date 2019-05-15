<?php
require("header.php");
require("partials/nav.php");
checklogin();
$getproducts = getproducts($connection);
?>

<body>
  <section class="section">
    <div class="container">
      <div class="box">
        <h2 class="title is-4">Listing categories</h2>
        <div class="control">
          <label class="radio">
            <input type="radio" name="answer">
            All
          </label>
          <label class="radio">
            <input type="radio" name="answer">
            No
          </label>
        </div>
      </div>
      <div class="columns">
      <?php
      while ($row = mysqli_fetch_array($getproducts)){ ?>

        <div class="column">
        <div class="card">
          <a href="product.php?prodid=<?php echo $row['productId']; ?>">
          <div class="card-image">
            <figure class="image is-2by1">
              <img src="<?php echo $row['pictureUrl']; ?>" alt="Placeholder image">
            </figure>
          </div>
          <div class="card-content">
            <div class="media">
              <div class="media-left">
              </div>
              <div class="media-content">
                <p class="title is-4"><?php echo $row['productName']; ?></p>
                <p class="subtitle is-6">Asking price $<?php echo $row['askingPrice']; ?></p>
              </div>
            </div>

            <div class="content">
              <p class="text category"><?php echo $row['categoryName']; ?></p>
              <time>Posted: <?php echo $row['created_at']; ?></time>
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
