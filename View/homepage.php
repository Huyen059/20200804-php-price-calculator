<?php require 'includes/header.php'?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section>
<p>This is home page</p>
<form method="post">
    <select name="products">
        <option selected disabled value="">Choose a product</option>
        <?php
        /**
         * @var array $products
         */
        foreach ($products as $product){
        }


        ?>

    </select>
</form>
</section>
<?php require 'includes/footer.php'?>
