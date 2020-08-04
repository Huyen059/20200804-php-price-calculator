<?php
declare(strict_types=1);
//Displaying errors since this is turned off by default
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class Group
{
    private int $id, $parent_id, $fixed_discount, $variable_discount;
    private string $name;
    /**
     * @var Customer[]
     */
    private array $customers;
}