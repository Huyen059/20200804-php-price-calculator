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

/**
 * @param int $id
 * @return Product
 */
function getProductInfo(int $id): Product
{
    $pdo = openConnection();
    $handle = $pdo->prepare('SELECT * FROM product WHERE id = :id');
    $handle->bindValue('id', $id);
    $handle->execute();
    $item = $handle->fetch();
    return new Product((int)$item['id'], $item['name'], (int)$item['price']);
}

/**
 * @param int $id
 * @return Customer
 */
function getCustomerInfo(int $id): Customer
{
    $pdo = openConnection();
    $handle = $pdo->prepare('SELECT * FROM customer WHERE id = :id');
    $handle->bindValue('id', $id);
    $handle->execute();
    $customer = $handle->fetch();
    $group = getGroupInfo((int)$customer['group_id']);
    return new Customer((int)$customer['id'], $customer['firstname'], $customer['lastname'], $group, (int)$customer['fixed_discount'], (int)$customer['variable_discount']);
}

/**
 * @param int $id
 * @return Group
 */
function getGroupInfo(int $id): Group
{
    $pdo = openConnection();
    $handle = $pdo->prepare('SELECT * FROM customer_group WHERE id = :id');
    $handle->bindValue('id', $id);
    $handle->execute();
    $group = $handle->fetch();
    return new Group((int)$group['id'], (int)$group['parent_id'], (int)$group['fixed_discount'], (int)$group['variable_discount'], (string)$group['name']);
}

/**
 * @return Product[]
 */
function getAllProductInfo(): array
{
    $pdo = openConnection();
    $handle = $pdo->prepare('SELECT * FROM product');
    $handle->execute();
    $array = $handle->fetchAll();
    $products = [];
    foreach ($array as $item) {
        $products[] = getProductInfo((int)$item['id']);
    }
    return $products;
}

/**
 * @return Customer[]
 */
function getAllCustomerInfo(): array
{
    $pdo = openConnection();
    $handle = $pdo->prepare('SELECT * FROM customer');
    $handle->execute();
    $array = $handle->fetchAll();
    $customers = [];
    foreach ($array as $customer) {
        $customers[] = getCustomerInfo((int)$customer['id']);
    }
    return $customers;
}




