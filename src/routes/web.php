<?php

use App\Controller\HomeController;
use App\Router\Router;

Router::get("/", [HomeController::class, "index"]);