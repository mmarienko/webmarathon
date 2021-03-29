<?php

/*
   Task 05 (Normal/index.php)
   Task name: Namespace "Quantum"
*/

  namespace Space\Normal;
  use DateTime;
  function calculate_time() {
    $date = new DateTime("1939-01-01");
    $now = new DateTime("now");
    $result = $date->diff($now);
    return $result;
  }
?>
