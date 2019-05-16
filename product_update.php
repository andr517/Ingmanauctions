<?php
require("header.php");
require("partials/nav.php");
checklogin();

if(isset($_GET['editid']) && $_GET['editid'] > 0 ){
	$productData = getproductdata($connection,$_GET['editid']);
}

// Skall kunden uppdateras?
if(isset($_POST['updateid']) && $_POST['updateid'] > 0){
	updateCustomer($connection);

	header("Location: account.php?editid=".$_POST['updateid']);
}
$getcategories = getcategories($connection);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="product_update.php" method="post">
      <input type="hidden" name="updateid" value="<?php echo $productData['productId']; ?>">
      <div id="center" class="section">
     <div class="container">
       <div class="tile is-ancestor">
         <div class="tile is-parent">
           <div class="tile is-child box is-11">
             <figure class="image is-3by2">
               <img src="<?php echo $productData['pictureUrl']; ?>" alt="Placeholder image">
               <textarea class="textarea" name="txtimg"><?php echo $productData['pictureUrl']; ?></textarea>
             </figure>
           </div>
         </div>
         <div class="tile is-vertical is-parent">
           <div class="tile is-child box">
             <p class="title is-4"><input class="input" type="text" name="txttitle" value="<?php echo $productData['productName']; ?>"></p>


               <div class="field">
                 <p class="control has-icons-left">

                   </span>
                 </p>
                 <p class="text">Posted by user: <?php echo $productData['username']; ?></p>
                 <p>Starting bid: $<input class="input" type="number" name="price" value="<?php echo $productData['askingPrice']; ?>"></p>
                 <p>Category:</p>
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
               </div>


           </div>
           <div class="tile is-child box">
             <p class="text"><textarea class="textarea" name="txtdes"><?php echo $productData['productDescription']; ?></textarea></p>
           </div>
					 <p><input class="button is-dark" type="submit" value="Save changes"></p>
         </div>

       </div>

     </div>
     </div>

    </form>
  </body>
</html>
