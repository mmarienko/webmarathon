<?php
header("Refresh: 2");

use model\Games;
$games = new Games();

if ($games->find($_SESSION['user']['login'])) {
   header("Location: /battle");
}

if (isset($_POST['destroy_game'])) {
	$games->delete($_SESSION['user']['login']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Wait</title>
   <link rel="stylesheet" href="/public/style/style.css">
</head>
<body>
   <section class="home">
      <div class="home__inner">
         <div class="home__title">Please, wait for an opponent</div>
         <form action="" class="home__body" method="POST">
            . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
            <button type="submit" class="home__btn" name="destroy_game">Destroy game</button>
         </form>
      </div>
   </section>
   <script src="/public/js/script.js"></script>
</body>
</html>