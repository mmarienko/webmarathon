<?php
/*
   Task 09 (index.php)
   Task name: A new set
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>t09</title>
   <style>
      form {
         border: 2px solid gray;
         padding: 20px;
         margin-top: 20px;
      }

      .post {
         background: lightgrey;
         border: 1px solid black;
         padding: 20px;
         display: flex;
         flex-flow: column;
      }
   </style>
</head>

<body>
   <h1>New Avenger application</h1>
   <?php
   if ($_POST) { ?>
      <section class="post">
         <h2><?php echo $_SERVER['REQUEST_METHOD'] ?></h2>
         <?php
         $arr = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'age' => $_POST['age'],
            'descriptions' => $_POST['about'],
            'photo' => $_POST['photo']
         ];
         echo "Array<br>(<br>";
         foreach ($arr as $k => $v) {
            echo "&emsp;[$k] => $v<br>";
         }
         echo ")\n";
         ?>
      </section>
   <?php  }
   ?>
   <form action="index.php" method="post">
      <fieldset>
         <legend>About candidate</legend>
         <p>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" autofocus placeholder="Tell your name" autocomplete="name" required />
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Superhero alias" autocomplete="email" required/>
            <label for="age">Age</label>
            <input type="number" id="age" name="age" min="1" max="999" step="1" required/>
         </p>
         <p>
            <label for="about">About</label>
            <textarea id="about" placeholder="Tell about the yourself, max 500 symbols" rows="5" cols="70" maxlength="500" name="about" required></textarea>
         </p>
         <p>
            <label for="photo">Your photo</label>
            <input type="file" id="photo" name="photo" accept="image/x-png,image/gif,image/jpeg" required>
         </p>
      </fieldset>
      <p>
         <button type="reset">CLEAR</button>
         <button type="submit">SEND</button>
      </p>
   </form>
</body>

</html>