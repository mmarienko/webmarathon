<?php
session_start();

if (isset($_GET['forget'])) {
   unset($_SESSION['post']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <title>t01</title>
</head>

<body>
   <h1>Session for new</h1>
   <?php if (isset($_POST)) {
      foreach ($_POST as $key => $value) {
         $_SESSION['post'][$key] = $value;
      }
   }
   ?>

   <?php if (isset($_SESSION['post'])) : ?>
      <section class="post">
         <ul>
            <?php foreach ($_POST as $key => $value) : ?>
               <?php if (gettype($value) == "array") : ?>
                  <li><?= "$key: " . count($value) ?></li>
               <?php else : ?>
                  <li><?= "$key: $value" ?></li>
               <?php endif ?>
            <?php endforeach; ?>
         </ul>
      </section>
      <form action="" method="GET">
         <button type="submit" name="forget">FORGET</button>
      </form>
   <?php else : ?>
      <form action="" method="POST">
         <fieldset>
            <fieldset>
               <legend>About HERO</legend>
               <p>
                  <label for="realname">Real Name</label>
                  <input type="text" id="realname" autofocus placeholder="Hero real name" name="name" />
                  <label for="superhero">Current Alias</label>
                  <input type="text" id="alias" placeholder="Hero alias" name="alias" />
                  <label for="age">Age</label>
                  <input type="number" id="age" min="1" max="999" step="1" name="age" />
               </p>
               <p>
                  <label for="about">About</label>
                  <textarea id="about" placeholder="Information about the hero, max 500 symbols" name="description" rows="5" cols="70" maxlength="500"></textarea>
               </p>
               <p>
                  <label for="photo">About</label>
                  <input type="file" id="photo" name="file" accept="image/*" name="photo">
               </p>
            </fieldset>
            <fieldset>
               <legend>Powers</legend>
               <p>
                  <input type="checkbox" id="strength" name="expecience[]">
                  <label for="strength">Strength</label>
                  <input type="checkbox" id="speed" name="expecience[]">
                  <label for="speed">Speed</label>
                  <input type="checkbox" id="intelligence" name="expecience[]">
                  <label for="intelligence">Intelligence</label>
                  <input type="checkbox" id="teleportation" name="expecience[]">
                  <label for="teleportation">Teleportation</label>
                  <input type="checkbox" id="immortal" name="expecience[]">
                  <label for="immortal">Immortal</label>
                  <input type="checkbox" id="another" name="expecience[]">
                  <label for="another">Another</label>
               </p>
               <p>
                  <label for="range">Level of control</label>
                  <input type="range" id="range" step="1" min="0" max="10" name="level">
               </p>
            </fieldset>
            <fieldset>
               <legend>Publicity</legend>
               <p>
                  <input type="radio" name="purpose" id="radio-1" value="0">
                  <label for="radio-1">UNKNOWN</label>
                  <input type="radio" name="purpose" id="radio-2" value="1">
                  <label for="radio-2">LIKE A GHOST</label>
                  <input type="radio" name="purpose" id="radio-3" value="2">
                  <label for="radio-3">I AM IN COMICS</label>
                  <input type="radio" name="purpose" id="radio-4" value="3">
                  <label for="radio-4">I HAVE FUN CLUB</label>
                  <input type="radio" name="purpose" id="radio-5" value="4">
                  <label for="radio-5">SUPERSTAR</label>
               </p>
            </fieldset>
            <p>
               <button type="reset">CLEAR</button>
               <button type="submit">SEND</button>
            </p>
         </fieldset>
      </form>
   <?php endif ?>
</body>

</html>