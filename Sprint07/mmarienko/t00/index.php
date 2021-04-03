<?php
setcookie('count', isset($_COOKIE['count']) ? ++$_COOKIE['count'] : 1, strtotime( '+1 minutes' ));
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>t00</title>
</head>

<body>
   <h1>Cookie counter</h1>
   <p>
      This page was loaded <?= isset($_COOKIE['count']) ? $_COOKIE['count'] : 1 ?> time(s) in last minute.
   </p>
</body>

</html>