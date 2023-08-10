<?php
// Altera a quantidade de produto

session_start();

require '../vendor/autoload.php';

use app\classes\Cart;

$quantity = strip_tags($_GET['qty']);
$id = strip_tags($_GET['id']);

$cart = new Cart;
$cart->quantity($id,$quantity);

header('Location:cart.php');

