<?php
declare(strict_types=1);
//Displaying errors since this is turned off by default
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class Customer
{
    private Group $group;
    private string $firstName, $lastName;

    /**
     * Customer constructor.
     * @param int $id
     * @param string $firstName
     * @param string $lastName
     * @param Group $group
     * @param int $fixed_discount
     * @param int $variable_discount
     */
    public function __construct(int $id, string $firstName, string $lastName, Group $group, int $fixed_discount, int $variable_discount)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->group = $group;
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
//
//    /**
//     * @param array $groups
//     * @return Group
//     */
//    public function getGroup(array $groups): Group
//    {
//
//    }
//
//    /**
//     * @param Group[] $groups
//     * @return int
//     */
//    public function getFinalVariableDiscount(array $groups): int
//    {
//        $customerVariableDiscount = $this->getVariableDiscount();
//
//
//    }
}