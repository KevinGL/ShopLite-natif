<?php
require_once __DIR__ . '/../src/Router.php';
require_once __DIR__ . '/../src/Controller/AbstractController.php';
require_once __DIR__ . '/../src/Controller/HomeController.php';
require_once __DIR__ . '/../src/routes/web.php';

use App\Router\Router;

Router::readRoutes();