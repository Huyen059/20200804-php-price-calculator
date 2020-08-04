<?php
declare(strict_types=1);
//Displaying errors since this is turned off by default
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class Customer
{
    private int $id, $group_id, $fixed_discount, $variable_discount;
    private string $firstName, $lastName;
    /**
     * @var Product[]
     */
    private array $products;

    /**
     * Customer constructor.
     * @param int $id
     * @param string $firstName
     * @param string $lastName     * @param int $group_id
     * @param int $fixed_discount
     * @param int $variable_discount
     */
    public function __construct(int $id, string $firstName, string $lastName, int $group_id, int $fixed_discount, int $variable_discount)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->group_id = $group_id;
        $this->fixed_discount = $fixed_discount;
        $this->variable_discount = $variable_discount;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getGroupId(): int
    {
        return $this->group_id;
    }

    /**
     * @return int
     */
    public function getFixedDiscount(): int
    {
        return $this->fixed_discount;
    }

    /**
     * @return int
     */
    public function getVariableDiscount(): int
    {
        return $this->variable_discount;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return Product[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

}