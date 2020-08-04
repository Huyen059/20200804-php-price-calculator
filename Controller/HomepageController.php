<?php
declare(strict_types=1);
//Displaying errors since this is turned off by default
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class HomepageController
{
    public function render(): void
    {
        /**
         * @var Product[]
         */
        $products = getAllProductInfo();
        /**
         * @var Customer[]
         */
        $customers = getAllCustomerInfo();

        $message = '';
        if(isset($_POST['productId'], $_POST['customerId'])){
            $customer = $customers[(int)$_POST['customerId']];
            $finalPrice = $customer->calculatePrice($products[(int)$_POST['productId']]);
        }

        if (isset($finalPrice)) {
            $finalPriceToBeDisplay = number_format($finalPrice, 2);
            $message = "<h5>Your price: &euro;{$finalPriceToBeDisplay}</h5>";
        }

        require 'View/homepage.php';
    }
}