<?php

/*
   Task 04 (test.php)
   Task name: Files
*/

function autoload($pClassName)
{
   include(__DIR__ . '/' . $pClassName . '.php');
}
spl_autoload_register("autoload");

$file = new File("tmp/tony_stark_characteristic");
$file->write("volatile, self-obsessed, don't play well with others.");

$content = $file->toList();
echo $content . "\n";

$list = new FilesList("tmp");
echo $list->toList() . "\n";
