<?php

/*
    Task 02 (index.php)
    Task name: Range
*/

function checkDivision($from = 0, $to = 60)
{
    for ($i = $from; $i <= $to; $i++) {
        $message = 'The number ' . $i;
        $flag = false;
        if ($i == 0) {
            continue;
        }
        if ($i % 2 == 0) {
            if ($flag) {
                $message .= ",";
            }
            $message .= " is devisible by 2";
            $flag = true;
        }
        if ($i % 3 == 0) {
            if ($flag) {
                $message .= ",";
            }
            $message .= " is devisible by 3";
            $flag = true;
        }
        if ($i % 10 == 0) {
            if ($flag) {
                $message .= ",";
            }
            $message .= " is devisible by 10";
            $flag = true;
        }
        if (!$flag) {
            $message .= " -";
        }
        echo $message . "\n";
    }
}
