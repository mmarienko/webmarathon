<?php
session_start();

if (isset($_GET['logout'])) {
   unset($_SESSION['user']);
}

include('connection/DatabaseConnection.php');
include('model/Model.php');
include('model/Users.php');

$users = new Users();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>t01</title>
   <link rel="stylesheet" href="style.css">
</head>

<body>
   <h1>Login</h1>
   <?php if (isset($_POST['signin']) && $users->login($_POST['login'], $_POST['password'])) {
      foreach ($_POST as $key => $value) {
         $_SESSION['user'][$key] = $value;
      }
   }
   ?>
   <?php
   if (isset($_POST['signup'])) {
      if (
         $_POST['password'] == $_POST['confirm']
      ) {
         if ($users->create($_POST['login'], $_POST['password'], $_POST['fullname'], $_POST['email'], $_POST['status'])) {
            echo "Success";
         }
      } else {
         echo "Wrong confirm password";
      }
   }
   ?>
   <?php if (isset($_SESSION['user'])) : ?>
      <section class="info">
         <p><?= "login: " . $_SESSION['user']['login'] ?></p>
         <p><?= "password: " . $_SESSION['user']['password'] ?></p>
      </section>
      <form action="" method="GET">
         <button type="submit" name="logout">LOGOUT</button>
      </form>
   <?php elseif (isset($_GET['registration'])) : include('registration.html');  ?>
   <?php else : include('authorization.html'); endif; ?>
   <script src="script.js"></script>
</body>

</html>