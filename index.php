<?php

use App\Router;
use Frame\AutoloaderPSR4;

ini_set('display_errors', '1');

include_once 'Frame/AutoloaderPSR4.php';
new AutoloaderPSR4;
new Router;
