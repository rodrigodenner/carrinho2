<?php

namespace app\interfaces;

interface CartInterface
{
    
    public function add($product);// adicionar o produto
    public function remove($product);//remover o produto
    public function quantity($product, $quantity);//alterar a quantidade do produto
    public function clear();//Limpar o carrinho
    public function cart();//pegar os dados do carrinho
    public function dump();//Exibe informações de depuração do carrinho.

}