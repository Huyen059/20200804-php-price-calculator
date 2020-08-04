<?php
declare(strict_types=1);
//Displaying errors since this is turned off by default
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class Customer
{
    private int $id, $group_id, $fix_discount, $variable_discount;
    private string $firstName, $lastName;
    /**
     * @var Product[]
     */
    private array $products;
}