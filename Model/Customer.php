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

    public function getMaxVariableDiscount(): int
    {
        $max = $this->variable_discount;
        $group = $this->group;
        while($group->getGroup() !== null) {
            $variableDiscountOfGroup = $group->getGroup()->getVariableDiscount();
            $max = ($max < $variableDiscountOfGroup) ? $variableDiscountOfGroup : $max;
            $group = $group->getGroup();
        }
        return $max;
    }

    public function getMaxFixedDiscount(): int
    {
        $max = $this->fixed_discount;
        $group = $this->group;
        while($group->getGroup() !== null) {
            $fixedDiscountOfGroup = $group->getGroup()->getFixedDiscount();
            $max = ($max < $fixedDiscountOfGroup) ? $fixedDiscountOfGroup : $max;
            $group = $group->getGroup();
        }
        return $max;
    }

    public function calculatePrice(Product $product): float
    {
        $maxVariableDiscount = $this->getMaxVariableDiscount();
        $maxFixedDiscount = $this->getMaxFixedDiscount();
        $different = ($product->getPrice())/100 - $maxFixedDiscount;
        $price = ($different > 0) ? $different : 0;
        if($price !== 0) {
            $price *= (1 - $maxFixedDiscount / 100);
        }
        return $price;
    }
}