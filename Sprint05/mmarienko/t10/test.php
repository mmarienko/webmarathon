<?php

/*
   Task 10 (test.php)
   Task name: Trait
*/

spl_autoload_register(function ($class_name) {
   include $class_name . '.php';
});

$mark_II = new MarkII();

echo $mark_II->makeBoom() . "\n";

class WarMachine extends MarkII
{
   use Update;
}

$wm = new WarMachine();
print_r($wm->makeBoom());
