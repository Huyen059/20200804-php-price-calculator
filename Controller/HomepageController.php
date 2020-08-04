<?php
declare(strict_types=1);
//Displaying errors since this is turned off by default
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class HomepageController
{
    public function render(array $GET, array $POST)
    {
        $products = getAllProductInfo();

        require 'View/homepage.php';
    }
}