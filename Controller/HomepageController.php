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
        /**
         * @var Product[]
         */
        $products = getAllProductInfo();
        $customers = getAllCustomerInfo();
//        /**
//         * @var Customer $test
//         */
//        $test = $customers[9];
//
//        $maxVarDis = $test->getMaxVariableDiscount();
//        $maxFixDis = $test->getMaxFixedDiscount();
//        $price = $test->calculatePrice($products[0]);
        if(isset($_POST['productId']) && isset($_POST['customerId'])){
            $productId = htmlspecialchars(trim($_POST['productId']));
            $customerId = htmlspecialchars(trim($_POST['customerId']));
            /**
             * @var Customer $customer
             */
            $customer = $customers[$customerId-1];
            $price = $customer->calculatePrice($products[$productId-1]);
        }
        require 'View/homepage.php';
    }
}