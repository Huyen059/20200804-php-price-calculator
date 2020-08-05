<?php


class ProductLoader extends DataLoader
{
    /**
     * @var Product[]
     */
    private array $products;

    /**
     * ProductLoader constructor.
     */
    public function __construct()
    {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('SELECT * FROM product');
        $handle->execute();
        $products = $handle->fetchAll();
        foreach ($products as $item) {
            $this->products[$item['id']] = new Product((int)$item['id'], $item['name'], (int)$item['price']);
        }
    }

    /**
     * @return Product[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

}