<?php

ini_set('display_errors', '1');

require_once 'vendor/autoload.php';
include_once 'App/src/includes/main.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="App/src/assets/css/style.css">

    <title>PingCounter</title>

</head>

<body>

    <!-- start template -->
    <div class="table">
        <!-- Get new page -->
        <?= getPage() ?>
    </div>
    <!-- end template -->



</body>

</html>