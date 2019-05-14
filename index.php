<?php
require("header.php");
require("partials/nav.php");
checklogin();
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
    </div>
  </section>
</body>


<?php require('footer.php'); ?>
