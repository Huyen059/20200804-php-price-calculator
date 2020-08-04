<?php
declare(strict_types=1);
//Displaying errors since this is turned off by default
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class Group
{
    private int $id, $fixed_discount, $variable_discount;
    private $group;
    private string $name;

    /**
     * Group constructor.
     * @param int $id
     * @param int $parent_id
     * @param int $fixed_discount
     * @param int $variable_discount
     * @param string $name
     */
    public function __construct(int $id, int $parent_id, int $fixed_discount, int $variable_discount, string $name)
    {
        $this->id = $id;
        $this->group = ($parent_id !== 0) ? getGroupInfo($parent_id) : null;
        $this->fixed_discount = $fixed_discount;
        $this->variable_discount = $variable_discount;
        $this->name = $name;
    }


}