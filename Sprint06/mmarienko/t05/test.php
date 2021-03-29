<?php

/*
   Task 05 (test.php)
   Task name: Namespace "Quantum"
*/

require_once __DIR__ . '/Normal/index.php';
require_once __DIR__ . '/Quantum/index.php';

$time = Space\Normal\calculate_time();
echo "In real life you were absent for " . $time->format("%Y") . " years, " . $time->format("%m") . " months, " . $time->format("%d") . " days\n";

$time = Space\Quantum\calculate_time();
echo "\nIn quantum space you were absent for " . $time[0] . " years, " . $time[1] . " months, " . $time[2] . " days\n";
