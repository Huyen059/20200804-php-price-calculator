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

        $message = '';
        if(isset($_POST['productId']) && isset($_POST['customerId'])){
            /**
             * @var Customer $customer
             */
            $customer = getCustomerInfo((int)$_POST['customerId']);
            $finalPrice = $customer->calculatePrice(getProductInfo((int)$_POST['productId']));
        }

        if (isset($finalPrice)) {
            $finalPrice = number_format($finalPrice, 2);
            $message = "<h5>Your price: &euro;{$finalPrice}</h5>";
        }

        require 'View/homepage.php';
    }
}