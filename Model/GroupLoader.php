<?php
declare(strict_types=1);
//Displaying errors since this is turned off by default
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class GroupLoader extends DataLoader
{
    /**
     * @var Group[]
     */
    public static array $groups;

    /**
     * GroupLoader constructor.
     */
    public function __construct()
    {
        if(empty(self::$groups)) {
            $pdo = $this->openConnection();
            $handle = $pdo->prepare('SELECT * FROM customer_group');
            $handle->execute();
            $groups = $handle->fetchAll();
            foreach ($groups as $group) {
                self::$groups[$group['id']] = new Group((int)$group['id'], (int)$group['parent_id'], (int)$group['fixed_discount'], (int)$group['variable_discount'], (string)$group['name']);
            }
        }
    }

    /**
     * @return Group[]
     */
    public function getGroups(): array
    {
        return self::$groups;
    }

}