<?php

/*
    Task 04 (index.php)
    Task name: Total price
*/

function  total(float $addCount, float $addPrice, float $currentTotal = 0): float
{
    return $currentTotal += $addCount * $addPrice;
}
