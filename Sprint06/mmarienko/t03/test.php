<?php

/*
   Task 03 (test.php)
   Task name: Serialize
*/

include_once("Ant.php");

$ant = new Ant("Anthony", "sergeant", "2015-07-16", 1, 4);

$serialized = serialize($ant);
echo $serialized . "\n\n";

$unserialized = unserialize($serialized);
echo $unserialized;
