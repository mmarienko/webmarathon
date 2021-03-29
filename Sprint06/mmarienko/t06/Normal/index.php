<?php

/*
   Task 06 (Normal/index.php)
   Task name: Go web!
*/

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Normal space</title>
</head>

<body>
  <?php
    function calculate_time() {
      $date = new DateTime("1939-01-01");
      $now = new DateTime("now");
      $result = $date->diff($now);
      return $result;
    }
    $time = calculate_time();
    echo "<p>In real life you were absent for ". $time->format("%Y") . " years, ".$time->format("%m") . " months, ". $time->format("%d") . " days</p>";
  ?>
</body>

</html>