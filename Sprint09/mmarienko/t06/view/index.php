<?php

if (isset($_POST['logout'])) {
   unset($_SESSION['user']);
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
	<h1>Bring them together!</h1>
	<p>
		<a href="/t06/authorization">authorization</a>
	</p>
	<p>
		<a href="/t06/registration">registration</a>
	</p>
	<p>
		<a href="/t06/remind-password">remind-password</a>
	</p>
	<p>
		<a href="/t06/">Go home</a>
	</p>
	<?php if (isset($_SESSION['user'])) : ?>
      <section class="info">
         <p><?= "login: " . $_SESSION['user']['login'] ?></p>
         <p><?= "password: " . $_SESSION['user']['password'] ?></p>
      </section>
      <form action="" method="POST">
         <button type="submit" name="logout">LOGOUT</button>
      </form>
   <?php endif; ?>
	<script src="script.js"></script>
</body>

</html>