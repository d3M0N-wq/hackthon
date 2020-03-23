<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="style.css">

</head>
<body>
	<ul class="navbar">
	 <li><a class="logo" href="start.html"><img class="img1" src="download.png" alt="Home" width="110" height="40" ></a></li>
	 <li id="rs"><a href="login.php">Login</a></li>
 </ul>
	<img class="i1" src="i.jpg" alt="#" width="25%" height="40%">
	<img class="i2" src="si2.png" alt="#" width="25% " height="40%">
	<div class="header">
		<h2>Register</h2>
	</div>

	<form method="post" action="register.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>
