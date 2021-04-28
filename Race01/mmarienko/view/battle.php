<?php
header("Refresh: 5");
use model\Games;
$games = new Games();
$game = $games->getGame($_SESSION['user']['login']);

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
   <title>Battle</title>
   <link rel="stylesheet" href="public/style/style.css">
</head>
<body>
   <div class="battle__inner">
      <div class="battle__top">
         <div class="battle__profile">
            <div class="battle__img">
               <img src="public/img/unknow.svg" alt="avatar">
            </div>
            <div class="battle__health">
               <? for ($i=0; $i < $game[3] ; $i++) : ?>
                  <img src="public/img/heart.svg" alt="heart" class="battle__heart">
               <? endfor; ?>
               <? if ($game[3] == 0) : ?>
                     <div class="popup" style="z-index: 100;">
                           <div class="popup__inner">
                              <div class="popup__title"><?= $game[1]?> is winner!</div>
                              <div class="popup__img">
                              <?php if ($games->getNum($_SESSION['user']['login']) == 1) :?>
                                 <img src="public/img/sad.svg" alt="smile">
                              <?php elseif ($games->getNum($_SESSION['user']['login']) == 2) :?>
                                 <img src="public/img/happy.svg" alt="smile">
                              <? endif; ?>
                              </div>
                              <form action="" method="post">
                                 <button class="popup__btn" name="destroy_game">Go home</button>
                              </form>
                           </div>
                        </div>
               <? endif; ?>
            </div>
            <div class="battle__stones">
               <? for ($i=1; $i < $game[4] ; $i++) : ?>
                  <img src="public/img/stone-<?= $i?>.svg" alt="stone" class="battle__stone">
               <? endfor; ?>
            </div>
            <div class="battle__time">
               TIME: <span>30</span>s.
            </div>
         </div>
         <div class="battle__desk">
            <?php if ($games->getNum($_SESSION['user']['login']) == 1) :?>
               <?php foreach (explode(",", $game[7]) as $key => $value) :?>
                  <div class="battle__card">
                     <div class="battle__card-img"><img src="public/img/superhero-<?= $value?>.svg" alt="hero"></div>
                     <div class="battle__card-body">
                        <ul class="battle__card-list">
                           <li class="battle__card-li">Attack: <span>10</span></li>
                           <li class="battle__card-li">Defense: <span>8</span></li>
                           <li class="battle__card-li">Cost: <span>1</span></li>
                        </ul>
                        <form action="" method="POST">
                           <button class="battle__card-btn" name="add_game" value="<?= $value?>">Add</button>
                        </form>
                     </div>
                  </div>
               <?php endforeach; ?>
            <?php else : ?>
               <?php foreach (explode(",", $game[2]) as $key => $value2) :?>
                  <div class="battle__card battle__card--hide">
                     <div class="battle__card-img"><img src="public/img/superhero-<?= $value2?>.svg" alt="hero"></div>
                     <div class="battle__card-body">
                        <ul class="battle__card-list">
                           <li class="battle__card-li">Attack: <span>10</span></li>
                           <li class="battle__card-li">Defense: <span>8</span></li>
                           <li class="battle__card-li">Cost: <span>1</span></li>
                        </ul>
                     </div>
                  </div>
               <?php endforeach; ?>
            <?php endif; ?>
         </div>
      </div>
      <div class="battle__body">
         <div class="battle__title"><?= $game[1]?></div>
         <?php
            if (isset($_POST['add_game']) && $game[12] == 1 && $games->getNum($_SESSION['user']['login']) == 1) : ?>
                  <div class="battle__card battle__card--active">
                     <div class="battle__card-img"><img src="public/img/superhero-<?= $_POST['add_game']?>.svg" alt="hero"></div>
                     <div class="battle__card-body">
                        <ul class="battle__card-list">
                           <li class="battle__card-li">Attack: <span>10</span></li>
                           <li class="battle__card-li">Defense: <span>8</span></li>
                           <li class="battle__card-li">Cost: <span>1</span></li>
                        </ul>
                     </div>
                  </div>
            <?php $games->updateActiveCard($_POST['add_game'], $_SESSION['user']['login'], 1);
            $games->updateActive(2, $_SESSION['user']['login']);
          else: ?>
               <div class="battle__card battle__card--active">
                     <div class="battle__card-img"><img src="public/img/superhero-<?= $game[5]?>.svg" alt="unknown"></div>
                     <div class="battle__card-body">
                        <ul class="battle__card-list">
                           <li class="battle__card-li">Attack: <span>10</span></li>
                           <li class="battle__card-li">Defense: <span>8</span></li>
                           <li class="battle__card-li">Cost: <span>1</span></li>
                        </ul>
                     </div>
                  </div>
                  <? endif; ?>
         <div class="battle__vs">
            <div class="battle__round">round: <?= $game[10]?></div>
            <div class="battle__subtitle">VS</div>
         </div>
         <?php
            if (isset($_POST['add_game']) && $game[12] == 2 && $games->getNum($_SESSION['user']['login']) == 2) : ?>
                  <div class="battle__card battle__card--active">
                     <div class="battle__card-img"><img src="public/img/superhero-<?= $_POST['add_game']?>.svg" alt="hero"></div>
                     <div class="battle__card-body">
                        <ul class="battle__card-list">
                           <li class="battle__card-li">Attack: <span>10</span></li>
                           <li class="battle__card-li">Defense: <span>8</span></li>
                           <li class="battle__card-li">Cost: <span>1</span></li>
                        </ul>
                     </div>
                  </div>
            <?php $games->updateActiveCard($_POST['add_game'], $_SESSION['user']['login'], 2);
                  $games->updateActive(1, $_SESSION['user']['login']);
                  $games->updateRound(++$game[10], $_SESSION['user']['login']);
                  $games->updateLife(--$game[3], $_SESSION['user']['login']);
            else: ?>
               <div class="battle__card battle__card--active">
                     <div class="battle__card-img"><img src="public/img/superhero-<?= $game[11]?>.svg" alt="unknown"></div>
                     <div class="battle__card-body">
                        <ul class="battle__card-list">
                           <li class="battle__card-li">Attack: <span>10</span></li>
                           <li class="battle__card-li">Defense: <span>8</span></li>
                           <li class="battle__card-li">Cost: <span>1</span></li>
                        </ul>
                     </div>
                  </div>
            <? endif; ?>
         <div class="battle__title"><?= $game[6]?></div>
      </div>
      <div class="battle__bottom">
         <div class="battle__profile">
            <div class="battle__img">
               <img src="public/img/user.svg" alt="avatar">
            </div>
            <div class="battle__health">
               <? for ($i=0; $i < $game[8] ; $i++) : ?>
                  <img src="public/img/heart.svg" alt="heart" class="battle__heart">
               <? endfor; ?>
            </div>
            <div class="battle__stones">
               <? for ($i=1; $i < $game[9] ; $i++) : ?>
                  <img src="public/img/stone-<?= $i?>.svg" alt="stone" class="battle__stone">
               <? endfor; ?>
            </div>
            <div class="battle__time">
               TIME: <span>30</span>s.
            </div>
         </div>
         <div class="battle__desk">
            <?php if ($games->getNum($_SESSION['user']['login']) == 2) :?>
               <?php foreach (explode(",", $game[2]) as $key => $value) :?>
                  <div class="battle__card">
                     <div class="battle__card-img"><img src="public/img/superhero-<?= $value?>.svg" alt="hero"></div>
                     <div class="battle__card-body">
                        <ul class="battle__card-list">
                           <li class="battle__card-li">Attack: <span>10</span></li>
                           <li class="battle__card-li">Defense: <span>8</span></li>
                           <li class="battle__card-li">Cost: <span>1</span></li>
                        </ul>
                        <form action="" method="POST">
                           <button class="battle__card-btn" name="add_game" value="<?= $value?>">Add</button>
                        </form>
                     </div>
                  </div>
               <?php endforeach; ?>
               <?php else : ?>
                  <?php foreach (explode(",", $game[7]) as $key => $value) :?>
                     <div class="battle__card battle__card--hide">
                        <div class="battle__card-img"><img src="public/img/superhero-<?= $value?>.svg" alt="hero"></div>
                        <div class="battle__card-body">
                           <ul class="battle__card-list">
                              <li class="battle__card-li">Attack: <span>10</span></li>
                              <li class="battle__card-li">Defense: <span>8</span></li>
                              <li class="battle__card-li">Cost: <span>1</span></li>
                           </ul>
                        </div>
                     </div>
                  <?php endforeach; ?>
            <?php endif; ?>
         </div>
      </div>
   </div>
   <script src="public/js/script.js"></script>
</body>
</html>
