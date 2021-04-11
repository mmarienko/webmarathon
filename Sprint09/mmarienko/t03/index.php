<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>t03</title>
</head>

<body>
    <h1>Simple router</h1>
    <?php

    if ($_GET) {
        require_once("Router.php");
        $router = new Router();
        $router->setParams();
        $router->printParams();
    }

    ?>
</body>

</html>