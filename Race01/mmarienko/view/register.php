<?php

use model\Users;

$users = new Users();

if (isset($_POST['signup'])) {
	if (
		$_POST['password'] == $_POST['confirm']
	) {
		if ($users->create($_POST['login'], $_POST['password'], $_POST['fullname'], $_POST['email'])) {
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
   <title>Registration</title>
   <link rel="stylesheet" href="/public/style/style.css">
</head>
<body>
   <section class="home">
      <div class="home__inner">
         <div class="home__title">Registration</div>
         <form action="" class="home__body" onsubmit="validation(this, event)" method="POST">
            <input type="text" class="home__input" name="login" placeholder="Login" autocomplete="username">
            <input type="password" class="home__input" name="password" placeholder="Password" autocomplete="new-password">
            <input type="password" class="home__input" name="confirm" placeholder="Confirm password" autocomplete="new-password">
            <input type="email" class="home__input" name="email" placeholder="Email" autocomplete="email">
				<input type="text" class="home__input"  placeholder="Full name" name="fullname" required autocomplete="cc-name">
            <button type="submit" class="home__btn" name="signup">Sign up</button>
            <a href="/" class="home__btn">Home</a>
         </form>
      </div>
   </section>
   <script src="/public/js/script.js"></script>
</body>
</html>