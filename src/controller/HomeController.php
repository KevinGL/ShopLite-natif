<?php

namespace App\Controller;

use App\Controller\AbstractController\AbstractController;

class HomeController extends AbstractController
{
    public function index()
    {
        //echo "Page index";

        return $this->render("templates/home/index.html.nova", ["name" => "Vinke013", "store" => "ShopLite Natif"]);
    }
}