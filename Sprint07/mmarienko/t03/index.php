<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>t03</title>
</head>

<body>
   <h1>Charset</h1>
   <form action="" method="POST">
      <p>Change charset <input type="text" placeholder="Input string" name="string"></p>
      <p>Select charset or several charsets:
         <select multiple name="select[]">
            <option value="UTF-8">UTF-8</option>
            <option value="ISO-8859-1//TRANSLIT">ISO-8859-1</option>
            <option value="windows-1251">Windows-1252</option>
         </select>
         <button type="submit" name="charset">Change charset</button>
         <button type="submit" name="clear">Clear</button>
      </p>

   <?php if (!isset($_POST['clear']) && $_POST) : ?>
      <p>
         Input string:
         <textarea cols="20" rows="2" readonly><?= trim($_POST['string'])?></textarea>
      </p>
      <?php foreach ($_POST['select'] as $key => $value) : ?>
         <p>
            <?= $value?> :
            <textarea cols="20" rows="2" readonly><?= iconv("UTF-8", $value, $_POST['string'])?></textarea>
         </p>
      <?php endforeach ?>
   <?php endif ?>
   </form>
</body>

</html>