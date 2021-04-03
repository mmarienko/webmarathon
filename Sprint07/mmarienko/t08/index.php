<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>t08</title>
</head>

<body>
   <h1>Show other sites</h1>

   <form action="" method="POST">
      <input type="url" name="url" placeholder="url" required autocomplete="url">
      <button type="submit">go</button>
      <a href="index.php">BACK</a>
   </form>

   <?php if ($_POST) :
      $body = explode("<body", file_get_contents($_POST["url"]))[1];
      $body = explode("</body>", $body)[0];

      $body = "<body" . $body . "\n</body>";

      $body = str_replace("<", "&lt", $body);
      $body = str_replace(">", "&gt", $body);
   ?>
      <hr>
      url: <?= $_POST["url"] ?>
      <hr>

      <div>
         <pre><?= $body ?></pre>
      </div>


   <?php else : ?>
      <p> Type an URL...</p>
   <?php endif ?>

</body>

</html>