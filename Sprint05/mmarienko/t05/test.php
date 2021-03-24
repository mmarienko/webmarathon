<?php

/*
    Task 04 (test.php)
    Task name: String frequency
*/

include 'StrFrequency.php';

function test($string)
{
    $obj = new StrFrequency($string);
    $symbol = $obj->letterFrequencies();
    echo "Letters in " . $string . "\n";

    foreach ($symbol as $k => $v) {
        echo "Letter " . $k . " is repeated " . $v . " times\n";
    }

    $symbol = $obj->wordFrequencies();
    echo "Words in " . $string . "\n";

    foreach ($symbol as $k => $v) {
        echo "Word " . $k . " is repeated " . $v . " times\n";
    }
    echo "Reverse the string: " . $string . "\n";
    echo $obj->reverseString() . "\n";
}

test("Face it, Harley-- you and your Puddin' are kaput!");
echo "*************\n";
test("  Test test 123 45 !0 f   HeLlO wOrLd  ");
echo "*************\n";
test("");
