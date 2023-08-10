<?php
session_start();

require "../vendor/autoload.php";
use app\classes\Cart;
use app\classes\CartProducts;
use app\database\models\Read;

$read = new Read;



$cart = new Cart;
// $products = require "../app/helpers/products.php";
$productsInCart = $cart->cart();
$products = $read->all('products');
// alterando a quantidade de produtos 
// $cart->quantity(3,0);
// $cart->dump();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Cart</title>
</head>
<body>
    <div class="container">
        <ul>
        <?php foreach($products as $product):?>
        <li><?php echo $product->product;?> | R$ <strong><?php echo number_format($product->price, 2, ',', '.');?></strong> | 
        <a href="add.php?id=<?php echo $product->id;?>">add to cart</a>
        </li>
        <br>
      
        <?php endforeach?>
        </ul>
    </div>
    <br><hr>

    <h3>Produtos no Carrinho: <?php ?> </h3><br>
    <a href="cart.php">Go to Cart</a>
</body>
</html>