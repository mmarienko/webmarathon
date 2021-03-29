<?php

/*
   Task 02 (test.php)
   Task name: Clone the Avengers
*/

require_once(__DIR__ . "/Team.php");
require_once(__DIR__ . "/Avenger.php");
$arr = array();

$arr[0] = new Avenger("Tony Stark", "Iron Man", "man", 38, ["intelligence", "durability", "magnetism"], 120);

$arr[1] = new Avenger("Natasha Romanoff", "Black Widow", "woman", 35, ["agility", "martial arts"], 75);

$arr[2] = new Avenger("Carol Danvers", "Captain Marvel", "woman", 27, ["durability", "flight", "interstellar travel"], 95);

$team = new Team(1, $arr);

echo "Battle 1\n";
$cloned_team = clone $team;
$damage = 25;
$team->battle($damage);
$team->calculate_losses($cloned_team);

echo "\nBattle 2\n";
$cloned_team = clone $team;
$damage = 80;
$team->battle($damage);
$team->calculate_losses($cloned_team);
