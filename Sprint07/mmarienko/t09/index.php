<?php
function parseJSON($json)
{
   echo "<div class='marvel'>";

   foreach ($json as $key => $value) {
      if (!is_array($value)) {
         echo "<div class='marvel__header'>$key: <span>$value</span></div>";
      } else {
         echo "<div class='marvel__body'>$key: </div>";
         parseJSON($json[$key]);
      }
   }
   echo "</div>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="t09/style.css">
   <title>t09</title>
</head>

<body>
   <h1>Comics from Marvel API</h1>

   <?php

   $time = time();
   $public_key = "bc8b7fff1b0ccd59691b5d4ac634e832";
   $private_key = "c1025b8c14bf45fef8f4031fc362d4ffb19cb2a3";
   $hash = md5($time . $private_key . $public_key);

   $ch = curl_init("http://gateway.marvel.com/v1/public/comics?ts=$time&apikey=$public_key&hash=$hash");

   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   curl_setopt($ch, CURLOPT_HEADER, false);

   $html = curl_exec($ch);
   curl_close($ch);

   $json = json_decode($html, true);

   ?>

   <?php parseJSON($json); ?>

</body>

</html>