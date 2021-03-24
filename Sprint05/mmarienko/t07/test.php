<?php

/*
   Task 07 (test.php)
   Task name: Tower
*/

require_once(__DIR__ . "/Building.php");
require_once(__DIR__ . "/Tower.php");

$StarkTower = new Tower(93, "Different", "Manhattan, NY");

$StarkTower->setElevator(true);
$StarkTower->setArcCapacity(70);
$StarkTower->setHeight(1130);
echo $StarkTower->toString();
