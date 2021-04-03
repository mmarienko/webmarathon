<?php

function autoload($pClassName)
{
   include(__DIR__ . '/' . $pClassName . '.php');
}

spl_autoload_register("autoload");

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>t05</title>
</head>

<style>
   table, tr, td, th {
      border: 1px solid #000;
   }

   table button {
      display: table;
      background: #fff;
      border: 1px solid #999;
      border-radius: 10px;
   }
</style>

<body>
   <h1>Parsing CSV data</h1>
   <form action="" method="POST" enctype="multipart/form-data">
      Upload file
      <input type="file" name="file" required>
      <button type="submit" name="upload">Upload</button>
   </form> <br>
   <?php if (isset($_POST['upload'])) {
      $file = new File($_FILES['file']['name']);
      $file->write(file_get_contents($_FILES["file"]["tmp_name"]));
      rename($_FILES['file']['name'], "table.csv");
   }
   ?>
   <?php if ($_POST || $_GET) : ?>
      <form action="" method="GET">
         Filter:
         <select name="select" required>
            <option selected value="not-select">NOT SELECTED</option>
            <?php if (isset($_POST['filter'])) :
               $arr = [];
               $handler = fopen("table.csv", "r");
               $data = fgetcsv($handler);

               while ($data = fgetcsv($handler)) array_push($arr, $data[$_POST['filter']]);
               ?>

               <?php foreach (array_unique($arr) as $key => $value) : ?>
                  <option value="<?= $value ?>"><?= $value ?></option>
               <?php endforeach; ?>

               <?php fclose($handler); ?>
            <?php endif ?>
         </select>
         <button type="submit" name="apply" value="<?= $_POST['filter'] ?>">APPLY</button>
      </form>
      <?php $handler = fopen("table.csv", "r"); ?>
      <table>
         <thead>
            <tr>
               <?php foreach (fgetcsv($handler) as $key => $value) : ?>
                  <th>
                     <form action="" method="POST"><button type="submit" name="filter" value="<?= $key ?>"><?= $value ?></button></form>
                  </th>
               <?php endforeach ?>
            </tr>
         </thead>
         <?php while ($data = fgetcsv($handler)) : ?>
            <?php if (isset($_GET['apply'])) : ?>
               <?php if ($data[$_GET['apply']] != $_GET['select'] && $_GET['select'] != 'not-select') {
                  continue;
               } ?>
            <?php endif ?>
            <tr>
               <?php foreach ($data as $key => $value) : ?>
                  <td><?= $value ?></td>
               <?php endforeach;  ?>
            </tr>
         <?php endwhile ?>
      </table>
   <?php endif ?>
</body>

</html>