<?php
/*
   Task 08 (index.php)
   Task name: What about forms?
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>t08</title>
</head>

<body>
   <h1>What Thanos did for the Soul Stone</h1>
   <form action="index.php" method="post">
      <ul style="list-style: none; padding-left: 0;">
         <li>
            <label>
               <input type="radio" name="quiz" value="1"> Jumped from the mountain
            </label>
         </li>
         <li>
            <label>
               <input type="radio" name="quiz" value="2"> Made stone keeper to jump from the mountain
            </label>
         </li>
         <li>
            <label>
               <input type="radio" name="quiz" value="3"> Pushed Gamora off the mountain
            </label>
         </li>
      </ul>
      <button type="submit">I made a choice</button>
   </form>
   <p>
      <?php
      if ($_POST['quiz'] == 1) echo "Hello Word!!";
      else if ($_POST['quiz'] == 2) echo "Let's go!";
      else if ($_POST['quiz'] == 3) echo "Just do it!";
      ?>
   </p>

</body>

</html>