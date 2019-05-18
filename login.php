<div class="loginbg">
	<?php
require('header.php');
// Om formuläret submittas, infoga värden in i databasen.
if (isset($_POST['username'])){
// Tar bort backslash
	$username = stripslashes($_REQUEST['username']);
//Flyttar speciala karaktärer i en sträng
	$username = mysqli_real_escape_string($connection,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($connection,$password);
//Kollar om användaren finns i databasen.
        $query = "SELECT * FROM `users` WHERE username='$username'
				and password='".md5($password)."'";
	$result = mysqli_query($connection,$query) or die(mysql_error());
	$rows = mysqli_fetch_assoc($result);
	$count = mysqli_num_rows($result);
        if($count == 1){
	    $_SESSION['username'] = $username;
			$_SESSION['id'] = $rows['id'];
			$_SESSION['trn_date'] = $rows['trn_date'];

	   header("Location: index.php");
    }else{ ?>
	<section class="hero is-fullheight">
		<div class="hero-body">
			<div class="container has-text-centered">
				<div class="column is-4 is-offset-4">
					<h3 class="title has-text-danger">Username/password is incorrect.</h3>
					<p class="subtitle has-text-grey">Click here to <a href='login.php'>Login</a></p>
				</div>
			</div>
		</div>
	</section>
	<?php	}
    }else{
?>
	<section class="hero is-fullheight">
		<div class="hero-body">
			<div class="container has-text-centered">
				<div class="column is-4 is-offset-4">
					<figure class="image is-3by1">
						<img src="media/Ingmanaulogga1.svg">
					</figure>
					<div class="box">
						<form action="" method="post" name="login">
							<div class="field">
								<div class="control">
									<input class="input is-large" type="text" name="username" placeholder="Username" required />
								</div>
							</div>
							<div class="field">
								<div class="control">
									<input class="input is-large" type="password" name="password" placeholder="Password" required />
								</div>
							</div>
							<button class="button is-block is-dark is-large is-fullwidth">Login</button>
						</form>
					</div>
					<p class="subtitle">Not registered yet? <a href='register.php'>Register Here</a></p>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>
</div>
