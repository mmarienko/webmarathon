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
   <title>Your profile</title>
   <link rel="stylesheet" href="public/style/style.css">
</head>
<body>
   <section class="home">
      <div class="home__inner">
         <h1 class="home__title">Your profile</h1>
         <div class="home__img"><img src="public/img/user.svg" alt=""></div>
            <?php if (isset($_SESSION['user'])) : ?>
               <ul class="home__list">
                  <li class="home__option">Login: <?= $_SESSION['user']['login'] ?></li>
                  <li class="home__option">Password: <?= $_SESSION['user']['password'] ?></li>
               </ul>
            <?php endif; ?>
         <div class="home__body">
            <form action="" method="POST">
               <button type="submit" name="logout" class="home__btn">Logout</button>
            </form>
            <a href="/" class="home__btn">Go home</a>
            <a href="/search-game" class="home__btn">Search game</a>
         </div>
      </div>
   </section>
   <script src="public/js/script.js"></script>
</body>
</html>