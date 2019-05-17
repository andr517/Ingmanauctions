<?php
require("header.php");
require("partials/nav.php");
checklogin();
require('staff.php');
require('auctioneers.php');
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
      <div class="columns">
        <div class="column">
          <h2 class="title">Auctioneer</h2>
          <?php
          $auctioneers = new auctioneers('James','Johnsson',56,'James@IngmanAuctions.com','Cars',12,'media\Auctioneer.jpg');?>
          <div class="card">
            <div class="card-image">
              <figure class="image is-3by2">
                <img src="<?php echo $auctioneers->getPicture(); ?>" alt="">
              </figure>
            </div>
            <div class="card-content">
              <div class="content">
                <p class="text">
                  <?php echo $auctioneers->getName(); ?>
                  <?php echo $auctioneers->getlastName() . '<br>'; ?>
                </p>
                <p class="text">
                  <?php echo $auctioneers->getage() . ' Years old'; ?>
                </p>
                <p class="text">
                  <?php echo 'speciality: ' . $auctioneers->getSpeciality(); ?>
                </p>
                <p class="text">
                  <?php echo 'experiance: ' . $auctioneers->getExperiance() . ' Years'; ?>
                </p>
                <p class="text has-text-link">
                  <?php echo $auctioneers->getcontact();?>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <h2 class="title">Auctioneer</h2>
          <?php
          $auctioneers = new auctioneers('Lisa','Lisabeth',32,'lisa@IngmanAuctions.com','Art',3,'media\auctioneer2.jpg');?>
          <div class="card">
            <div class="card-image">
              <figure class="image is-3by2">
                <img src="<?php echo $auctioneers->getPicture(); ?>" alt="">
              </figure>
            </div>
            <div class="card-content">
              <div class="content">
                <p class="text">
                  <?php echo $auctioneers->getName(); ?>
                  <?php echo $auctioneers->getlastName() . '<br>'; ?>
                </p>
                <p class="text">
                  <?php echo $auctioneers->getage() . ' Years old'; ?>
                </p>
                <p class="text">
                  <?php echo 'speciality: ' . $auctioneers->getSpeciality(); ?>
                </p>
                <p class="text">
                  <?php echo 'experiance: ' . $auctioneers->getExperiance() . ' Years'; ?>
                </p>
                <p class="text has-text-link">
                  <?php echo $auctioneers->getcontact();?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
