<?php

/*
   Task 01 (test.php)
   Task name: Object to string
*/

require_once(__DIR__. "/Avenger.php");

$first_avenger= new Avenger("Tony Stark", "Iron Man", "man", 38,["intelligence", "durability", "magnetism"]);

$second_avenger= new Avenger("Natasha Romanoff", "Black Widow", "woman", 35,["agility", "martial arts"]);

echo"*** calling\$first_avenger() ***\n";
$first_avenger();

echo"*** calling echo\$second_avenger ***\n";
echo$second_avenger;

echo"*** calling\$second_avenger() ***\n";
$second_avenger();