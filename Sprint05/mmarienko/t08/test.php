<?php

/*
   Task 08 (test.php)
   Task name: Anonymous
*/

require_once(__DIR__ . "/Anonymous.php");
$mandarin = get_anonymous("Unknown", "Mandarin", "Ten Rings");

print(implode("\n", array("name" => $mandarin->getName(),
   "alias" => $mandarin->getAlias(), "affiliation" => $mandarin->getAffiliation())));
