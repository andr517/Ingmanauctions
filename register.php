<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<link rel="stylesheet" href="css/style.css" />
</head>

<body class="loginbg">
	<?php
require('header.php');
dbconfig();
// Om formuläret submittas, infogar värden in i databasen.
if (isset($_REQUEST['username'])){
        // tar bort backslash.
	$username = stripslashes($_REQUEST['username']);
        //flyttar speciella karaktärer in i en sträng.
	$username = mysqli_real_escape_string($connection,$username);
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($connection,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($connection,$password);
	$trn_date = date("Y-m-d H:i:s");
  $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($connection,$query);
				if($result){ ?>
	<section class="hero is-fullheight">
		<div class="hero-body">
			<div class="container has-text-centered">
				<div class="column is-4 is-offset-4">
					<h3 class="title has-text-grey">Registion successfull.</h3>
					<p class="subtitle has-text-grey">Click here to <a href='login.php'>Login</a></p>
				</div>
			</div>
		</div>
	</section>
	<?php }
    }
		else{
?>
	<section class="hero is-fullheight">
		<div class="hero-body">
			<div class="container has-text-centered">
				<div class="column is-4 is-offset-4">
					<figure class="image is-3by1">
						<img src="media/Ingmanaulogga1.svg">
					</figure>
					<div class="box">
						<form name="registration" action="" method="post">
							<div class="field">
								<div class="control">
									<div class="field">
										<input class="input is-large" type="text" name="username" placeholder="Username" required />
									</div>
									<div class="field">
										<input class="input is-large" type="email" name="email" placeholder="Email" required />
									</div>
									<div class="field">
										<input class="input is-large" type="password" name="password" placeholder="Password" required />
									</div>
								</div>
							</div>
							<button class="button is-block is-dark is-large is-fullwidth">Register</button>
						</form>
					</div>
					<p class="subtitle">Already a member? <a href='login.php'>Login here!</a></p>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>
</body>

</html>
