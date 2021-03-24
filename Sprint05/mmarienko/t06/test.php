<?php

/*
   Task 06 (test.php)
   Task name: HardWorker
*/

include 'HardWorker.php';

$Bruce = new HardWorker();

$Bruce->setName("Bruce");

echo $Bruce->getName() . "\n";

$Bruce->setAge(50);

$Bruce->setSalary(1500);

print_r($Bruce->toArray());

$Bruce->setName("Linda");

$Bruce->setAge(140);

print_r($Bruce->toArray());
