<?php

use model\Users;

$users = new Users();

if (isset($_POST['signup'])) {
	if (
		$_POST['password'] == $_POST['confirm']
	) {
		if ($users->create($_POST['login'], $_POST['password'], $_POST['fullname'], $_POST['email'], $_POST['status'])) {
			echo "Success";
		}
	} else {
		echo "Wrong confirm password";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bring them together!</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<h1>Registration</h1>
	<form action="" method="POST" onsubmit="validation(this, event)">
		<p>
			<input type="text" placeholder="Login" name="login" required autocomplete="username">
		</p>
		<p>
			<input type="password" placeholder="Password" name="password" required autocomplete="new-password">
		</p>
		<p>
			<input type="password" placeholder="Confirm password" name="confirm" required autocomplete="new-password">
		</p>
		<p>
			<input type="text" placeholder="Full name" name="fullname" required autocomplete="cc-name">
		</p>
		<p>
			<input type="email" placeholder="Email address" name="email" required autocomplete="email">
		</p>
		<p>
			<input type="text" placeholder="Status (admin/user)" name="status" required>
		</p>
		<button type="submit" name="signup">Sign up</button>
	</form>
	<p>
		<a href="/t06/authorization">Authorization</a>
	</p>
	<p>
		<a href="/t06/">Go home</a>
	</p>
	<script src="script.js"></script>
</body>

</html>