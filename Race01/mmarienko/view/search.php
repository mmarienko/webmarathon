<?php
use model\Games;
$games = new Games();
if (isset($_POST['create_game'])) {
	$games->create($_SESSION['user']['login']);
   header("Location: /wait");
}
if (isset($_POST['select_game'])) {
	$games->update($_POST['select_game'], $_SESSION['user']['login']);
   header("Location: /battle");
}
?>

<?php
$games_list = $games->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Search game</title>
   <link rel="stylesheet" href="/public/style/style.css">
</head>
<body>
   <section class="home">
      <div class="home__inner">
         <h1 class="home__title">Select game</h1>
         <div class="home__games">
            <?php foreach ($games_list as $key => $game) :?>
               <form action="" class="home__game" method="POST">
                  <div class="home__game-name"><?= $game[1] ?></div>
                  <button class="home__game-btn" value="<?= $game[1] ?>" name="select_game">Go</button>
               </form>
            <?php endforeach; ?>
            <a href="/" class="home__btn">Home</a>
            <form action="" method="post" class="home__body">
               <button type="submit" class="home__btn" name="create_game">create game</button>
            </form>
         </div>
      </div>
   </section>
   <script src="/public/js/script.js"></script>
</body>
</html>
