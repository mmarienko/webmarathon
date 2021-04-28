<?php

use model\Users;

$users = new Users();

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
   <title>Login</title>
   <link rel="stylesheet" href="/public/style/style.css">
</head>
<body>
   <section class="home">
      <div class="home__inner">
         <div class="home__title">Authorization</div>
         <form action="" class="home__body" method="POST">
            <input type="text" class="home__input" name="login" placeholder="Login" required autocomplete="username">
            <input type="password" class="home__input" name="password" placeholder="Password" required autocomplete="current-password">
            <button type="submit" class="home__btn" name="signin">Sign in</button>
            <a href="/" class="home__btn">Home</a>
         </form>
      </div>
   </section>
   <script src="/public/js/script.js"></script>
</body>
</html>