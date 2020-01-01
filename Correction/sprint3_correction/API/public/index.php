<?php

// Ceci est mon frontcontroller
require "../vendor/autoload.php";

use ocook\App;


$app = new App();

$app->handleRequest();
