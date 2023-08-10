<?php

namespace app\classes;

use app\interfaces\CartInterface;

class Cart implements CartInterface
{
    public function add($product){
        if(!isset($_SESSION['cart'])){ //se não existir uma sessao Cart eu vou criar
            $_SESSION['cart']=[];
        }

        // Se não existir uma sessão cart com produto eu vou criar
        (!isset($_SESSION['cart'][$product]))?
        // Se não existir o produto no carrinho vou adicionar
            $_SESSION['cart'][$product] = 1:
        // Se existir o produto no carrinho vou somar com o que já tem     
            $_SESSION['cart'][$product] +=1;
    }
        // remover o item do carrinho de compras
     public function remove($product)
    {
        if (isset($_SESSION['cart'][$product])) {
            unset($_SESSION['cart'][$product]);
        }
    }
        // fornecer ou alterar a quantidade de produto dentro do carrinho
    public function quantity($product, $quantity){
        // se o produto for igual a zero remove ele
        if (isset($_SESSION['cart'][$product])) {
            if ((int)$quantity === 0 || $quantity === '') {
                $this->remove($product);
                return;
            }
            $_SESSION['cart'][$product] = $quantity;
        }
    }
        // Limpar o carrinho de compras
    public function clear(){
        if(isset($_SESSION['cart'])){
            unset($_SESSION['cart']);
        }
    }

    public function cart(){
        // Verifica se a variável de sessão 'cart' está definida
        if(isset($_SESSION['cart'])){
            // Se estiver definida, retorna o conteúdo do carrinho de compras
            return $_SESSION['cart'];
        }
        return [];
        // Se a variável de sessão 'cart' não estiver definida, não retorna nada
        // Isso pode indicar que o carrinho está vazio ou ainda não foi criado
    }
    
    public function dump(){
        if(isset($_SESSION['cart'])){
            var_dump($_SESSION['cart']);
        }
    }
}