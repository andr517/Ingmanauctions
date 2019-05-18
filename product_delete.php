<?php
require("header.php");
require("partials/nav.php");
checklogin();

if(isset($_GET['deleteid']) && $_GET['deleteid'] > 0 ){
    $isDeleteid = $_GET['deleteid'];
}

if(isset($_POST['isdeleteid']) && $_POST['isdeleteid'] > 0){
    deleteCustomer($connection,$_POST['isdeleteid']);

    header("Location: account.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>
  <form action="product_delete.php" method="post">
    <input type="hidden" name="isdeleteid" value="<?php echo $isDeleteid; ?>">
    <section class="hero is-fullheight">
      <div class="hero-body">
        <div class="container has-text-centered">
          <div class="column is-4 is-offset-4">
            <label>Are you sure you want to delete your listing?</label>
            <p><input class="button" type="submit" value="JA"></p>
          </div>
        </div>
      </div>
    </section>
  </form>
</body>

</html>
