<?php
// Remover  produto

session_start();

require '../vendor/autoload.php';

use app\classes\Cart;


$id = strip_tags($_GET['id']);

$cart = new Cart;
$cart->remove($id);

header('Location:cart.php');

