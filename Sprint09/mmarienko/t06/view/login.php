<?php

use model\Users;

$users = new Users();

if (isset($_POST['logout'])) {
	unset($_SESSION['user']);
}

if (isset($_POST['signin']) && $users->login($_POST['login'], $_POST['password'])) {
	foreach ($_POST as $key => $value) {
		$_SESSION['user'][$key] = $value;
	}
	print_r('success');
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
	<h1>Login</h1>
	<p>Login admin; password: admin</p>
	<form action="" method="POST">
		<p>
			<input type="text" placeholder="Login" name="login" required autocomplete="username">
		</p>
		<p>
			<input type="password" placeholder="Password" name="password" required autocomplete="current-password">
		</p>
		<button type="submit" name="signin">Sign in</button>
	</form>
	<p>
		<a href="/t06/remind-password">Remind password</a>
	</p>
	<p>
		<a href="/t06/registration">Registration</a>
	</p>
	<p>
		<a href="/t06/">Go home</a>
	</p>
	<script src="script.js"></script>
</body>

</html>