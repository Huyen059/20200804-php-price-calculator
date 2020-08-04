<?php
declare(strict_types=1);
//Displaying errors since this is turned off by default
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

function openConnection(): PDO
{
    $dbhost = "localhost";
    $dbuser = "becode";
    $dbpass = password;
    $db = "price_calculator_db";

    $driverOptions = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    return new PDO('mysql:host=' . $dbhost . ';dbname=' . $db, $dbuser, $dbpass, $driverOptions);
}

function getAllProductInfo(): array
{
    $pdo = openConnection();
    // Getting product price and name to be displayed in the view
    $handle = $pdo->prepare('SELECT * FROM product');
    $handle->execute();
    $array = $handle->fetchAll();
    $products = [];
    foreach ($array as $item) {
        $products[] = new Product((int)$item['id'], $item['name'], (int)$item['price']);
    }
    return $products;
}

function getAllCustomerInfo(): array
{
    $pdo = openConnection();
    // Getting product price and name to be displayed in the view
    $handle = $pdo->prepare('SELECT * FROM customer');
    $handle->execute();
    $array = $handle->fetchAll();
    $customers = [];
    foreach ($array as $customer) {
        $customers[] = new Customer((int)$customer['id'], $customer['firstname'], $customer['lastname'], (int)$customer['group_id'], (int)$customer['fixed_discount'], (int)$customer['variable_discount']);
    }
    return $customers;
}


