<?php
require '../vendor/autoload.php';

use jbangy\Dependencies;
use jbangy\Routes;

$app = new \Slim\App;

Routes::initialize($app);
Dependencies::intialize();

$app->run();