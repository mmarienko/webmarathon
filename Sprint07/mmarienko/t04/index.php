<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>t04</title>
</head>

<body>

   <h1>Files</h1>

   <?php if (isset($_POST['delete'])) {
      unlink("tmp/" . $_POST['delete']);
   }
   ?>

   <form action="" method="post">
      <p>
         File name:
         <input type="text" name="file_name" required>
         Content:
         <textarea name="content" required></textarea>
         <button type="submit">Create file</button>
      </p>
   </form>

   <?php
   function autoload($pClassName)
   {
      include(__DIR__ . '/' . $pClassName . '.php');
   }
   spl_autoload_register("autoload");

   if ($_POST && $_POST["file_name"]) {
      $file = new File("tmp/" . $_POST["file_name"]);
      $file->write($_POST["content"]);
   }


   $list = new FilesList("tmp");
   if ($list->toList()) {
      echo '<h2>List of files:</h2>';
      echo $list->toList() . "\n";
   }
   ?>

   <?php if ($_GET) : ?>
      <h2>Selected file: <i>"<?= "tmp/" . $_GET['file'] ?>"</i></h2>
      <form action="" method="POST">
         <button type="submit" name="delete" value="<?= $_GET["file"] ?>">Delete file</button>
      </form>
      <?php $file = new File("tmp/" . $_GET["file"]); ?>
      <p>
         <?= $file->toList(); ?>
      </p>
   <?php endif  ?>

</body>

</html>