<?php
session_start();

if (isset($_GET['clear'])) {
   unset($_SESSION['user']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>t02</title>
   <style>
   .hacked {

      color: green;
   }
   .denied {
      font-size: 18px;
      color: red;
   }
   </style>
</head>

<body>
   <h1>Password</h1>
   <?php if (isset($_POST)) {
      foreach ($_POST as $key => $value) {
         if ($key == 'password') {
            $_SESSION['user'][$key] = md5($value . $_POST['salt']);
         } else {
            $_SESSION['user'][$key] = $value;
         }
      }
   }
   ?>
   <?php if (isset($_GET)) {
      if (md5($_GET['password'] . $_SESSION['user']['salt']) == $_SESSION['user']['password']) {
         $_SESSION['logined'] = true;
         unset($_SESSION['user']);
      }
   }
   ?>

   <?php if (isset($_SESSION['user'])) : ?>
      <form action="" method="GET">
         <?php if (isset($_GET['submit']) && $_GET['password'] != $_SESSION['user']['password']) : ?>
            <p class="denied"><?= 'Access denied!' ?></p>
         <?php endif ?>
         <span>
            Password saved at session.
         </span> <br />
         <span>
            Hash is <?= $_SESSION['user']['password'] ?>.
         </span> <br />
         <span>
            Try to guess: <input type="password" placeholder="Password to session" name="password" required>
            <button type="submit" name="submit">Check password</button>
         </span> <br />
         <button type="submit" name="clear">Clear</button>
      </form>
   <?php else : ?>
      <form action="" method="POST">
         <?php if (isset($_GET['submit']) && $_SESSION['logined']) : ?>
            <p class="hacked"><?= 'Hacked!' ?></p>
         <?php endif ?>
         <span>
            Password not saved at session.
         </span> <br />
         <span>
            Password for saving to session <input type="password" placeholder="Password to session" name="password" required>
         </span> <br />
         <span>
            Salt for saving to session <input type="text" placeholder="Salt to session" name="salt" required>
         </span> <br />
         <button type="submit">Save</button>
      </form>
   <?php endif ?>
</body>

</html>