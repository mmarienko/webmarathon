<?php
function autoload($pClassName)
{
   include(__DIR__ . '/' . $pClassName . '.php');
}
spl_autoload_register("autoload");

define("FILENAME", "nodes");
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>t06</title>
</head>

<body>
   <h1>Notepad mini</h1>
   <form action="" method="post">
      <pre>  <input type="text" name="name" placeholder="Name" required></pre>
      <pre>  <select name="importance"><option value="low">low</option><option value="medium">medium</option><option value="high">high</option></select></pre>
      </pre>
      <pre>  <textarea name="text" placeholder="Text of note..." required></textarea></pre>
      <pre>  <button type="submit" name="create">Create</button></pre>

   </form>

   <?php

   $descriptor = fopen(FILENAME, "c");

   $JSON_str = file_get_contents(FILENAME);
   $notes = null;

   if ($JSON_str) {
      $notes = unserialize(json_decode($JSON_str));
   } else {
      $notes = array();
   }

   if (isset($_GET["delete"])) {
      foreach ($notes as $note) {
         if ($_GET["delete"] == $note->getName()) {
            unset($notes[array_search($note, $notes)]);
            break;
         }
      }
   }

   if ($_POST || isset($_GET["delete"])) {
      $isRewrite = false;

      foreach ($notes as $note) {
         if ($_POST["name"] && $_POST["text"] && $_POST["name"] == $note->getName()) {
            $note->setText($_POST["text"]);
            $isRewrite = true;
            break;
         }
      }

      if ($_POST["name"] && $_POST["text"] && !$isRewrite) {
         $note = new Note($_POST["name"], $_POST["importance"], $_POST["text"]);
         array_push($notes, $note);
      }
      file_put_contents(FILENAME, json_encode(serialize($notes)));
   }

   $notePad = new NotePad($notes);

   fclose($descriptor);
   ?>

   <?php if ($notePad != '') : ?>
      <h2>List of notes</h2>
      <?= $notePad ?>
   <?php endif ?>

   <?php if (isset($_GET["note"])) : ?>
      <h2>Detail of "<?= $_GET['note'] ?>"</h2>
      <?= $notePad->getNoteWithName($_GET["note"]) ?>
   <?php endif ?>

</body>

</html>