<?php

use model\Users;

$users = new Users();

if (isset($_POST['remind'])) {
	$user = $users->find($_POST['login']);

	if (mail($user['email'], "Password reminder", "Your password: $user[password]")) {
		print_r('success');
	} else {
		print_r('error');
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
	<h1>Password reminder</h1>
	<form action="" method="POST">
		<p>
			<input type="text" placeholder="Login" name="login" required autocomplete="username">
		</p>
		<button type="submit" name="remind">Remind password</button>
	</form>
	<p>
		<a href="/t06/authorization">Authorization</a>
	</p>
	<p>
		<a href="/t06/registration">Registration</a>
	</p>
	<p>
		<a href="/t06/">Go home</a>
	</p>
	</div>
	<script src="script.js"></script>
</body>

</html>