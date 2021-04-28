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
   <title>Remind password</title>
   <link rel="stylesheet" href="/public/style/style.css">
</head>
<body>
   <section class="home">
      <div class="home__inner">
         <div class="home__title">Remind password</div>
         <form action="" class="home__body" method="POST">
            <input type="text" class="home__input" placeholder="Login" name="login" required autocomplete="username">
            <button type="submit" class="home__btn" name="remind">Send to email</button>
            <a href="/" class="home__btn">Home</a>
         </form>
      </div>
   </section>
   <script src="/public/js/script.js"></script>
</body>
</html>