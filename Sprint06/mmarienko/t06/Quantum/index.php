<?php

/*
   Task 06 (Quantum/index.php)
   Task name: Go web!
*/
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Quantum space</title>
</head>

<body>
    <?php

    function calculate_time()
    {
        $time = date_diff(date_create("Now"), date_create("1939-01-01"));
        $time = date_diff(((date_create("1939-01-01"))->add(new DateInterval('PT'.((int)($time->format("%a")/7*24*3600)).'S'))), (date_create("1939-01-01")));
        return [
            $time->format("%Y"),
            $time->format("%m"),
            $time->format("%d")
        ];
    }

    $time = calculate_time();
    echo "<p>In quantum space you were absent for " . $time[0] . " years, "
    . $time[1] . " months, " . $time[2] . " days!<\p>";

    ?>
</body>

</html>