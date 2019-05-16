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
    <section>
      <div class="container">
    <div class="columns has-text-centered">
      <div class="column">
    <?php
    $auctioneers = new auctioneers('James','Johnsson',38,'Cars',6,'media/james.jpg');?>
    <img src="<?php echo $auctioneers->getPicture(); ?>" alt="">
    <?php echo $auctioneers->getName() . '<br>'; ?>
    <?php echo $auctioneers->getlastName() . '<br>'; ?>
    <?php echo $auctioneers->getage() . ' Years old' . '<br>'; ?>
    <?php echo 'speciality: ' . $auctioneers->getSpeciality() . '<br>'; ?>
    <?php echo 'experiance: ' . $auctioneers->getExperiance() . ' Years'; ?>

  </div>
  <div class="column">
    Second column
  </div>
  <div class="column">
    Third column
  </div>
  <div class="column">
    Fourth column
  </div>
</div>
      </div>
  </section>
  </body>
</html>
