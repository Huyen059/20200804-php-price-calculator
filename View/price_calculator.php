<?php require 'includes/header.php' ?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section class="container">
    <form method="post">
        <div class="input-group mb-3">
            <select name="productId" class="custom-select">
                <option selected disabled value="">Choose a product</option>
                <?php
                /**
                 * @var Product[] $products
                 */
                foreach ($products as $productId => $product) {
                    $name = ucwords($product->getName());
                    $price = $product->getPrice() / 100;
                    $selected = '';
                    if (isset($_POST['productId'])) {
                        $id = (int)htmlspecialchars(trim($_POST['productId']));
                        if ($product->getId() === $id) {
                            $selected = 'selected';
                        }
                    }
                    echo "
                <option value='{$productId}' {$selected}>{$name} | &euro;{$price}</option>
                ";
                }
                ?>
            </select>
            <select name="customerId" class="custom-select">
                <option selected disabled value="">Choose a customer</option>
                <?php
                /**
                 * @var Customer[] $customers
                 */
                foreach ($customers as $customerId => $customer) {
                    $name = ucwords($customer->getFirstName() . " " . $customer->getLastName());
                    $selected = '';
                    if (isset($_POST['customerId'])) {
                        $id = (int)htmlspecialchars(trim($_POST['customerId']));
                        if ($customer->getId() === $id) {
                            $selected = 'selected';
                        }
                    }
                    echo "
                <option value='{$customerId}' {$selected}>{$name}</option>
                ";
                }
                ?>
            </select>
            <div class="input-group-append">
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </div>
    </form>
    <div class="py-4"><?php
            /**
             * @var string $message;
             */
            echo $message;
            ?></div>
</section>
<?php require 'includes/footer.php' ?>