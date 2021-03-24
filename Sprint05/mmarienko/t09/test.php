<?php

/*
   Task 09 (test.php)
   Task name: Overload
*/

require_once(__DIR__ . "/Overload.php");
$overload = new Overload();

$overload->mark_LXXXV = "INACTIVE";
echo $overload->mark_LXXXV;

echo "\n" . $overload->mark_LXXXVI;

if (isset($overload->mark_LXXXVI))
   echo "\n" . $overload->mark_LXXXVI;

unset($overload->mark_IV);
if ($overload->mark_IV == NULL)
   echo "\nNULL\n";
