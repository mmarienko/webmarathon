<?php
include('connection/DatabaseConnection.php');
include('model/Model.php');
include('model/Users.php');

$users = new Users();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>t00</title>
   <link rel="stylesheet" href="style.css">
</head>

<body>
   <h1>Registration</h1>
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
   <?php include('registration.html');  ?>
   <script src="script.js"></script>
</body>

</html>