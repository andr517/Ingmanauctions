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

      <?php
      while ($row = mysqli_fetch_array($getproducts)){ ?>

        <div class="card">
          <div class="card-image">
            <figure class="image is-4by3">
              <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
            </figure>
          </div>
          <div class="card-content">
            <div class="media">
              <div class="media-left">
                <figure class="image is-1by2">
                  <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                </figure>
              </div>
              <div class="media-content">
                <p class="title is-4">John Smith</p>
                <p class="subtitle is-6">@johnsmith</p>
              </div>
            </div>

            <div class="content">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Phasellus nec iaculis mauris. <a>@bulmaio</a>.
              <a href="#">#css</a> <a href="#">#responsive</a>
              <br>
              <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
            </div>
          </div>
        </div>

      <?php } ?>

    </div>
  </section>
</body>


<?php require('footer.php'); ?>
