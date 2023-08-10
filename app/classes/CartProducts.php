<?php

namespace app\classes;

use app\database\models\Read;
use app\interfaces\CartInterface;

class CartProducts
{
    public function products(CartInterface $cartInterface)
    {
        // Este método recupera os produtos do carrinho e calcula o total.
        
        // Busca os produtos atualmente no carrinho usando o CartInterface injetado.
        $productsInCart = $cartInterface->cart();
        
        // Carrega os dados dos produtos do banco de dados
        $productsInDataBase = (new Read)->all('products'); // Carrega todos os produtos do banco de dados
        
        // Inicializa arrays vazios para armazenar os dados dos produtos processados e o custo total.
        $products = [];
        $total = 0;
        
        // Percorre cada produto no carrinho e calcula subtotais e o custo total.
        foreach ($productsInCart as $productId => $quantity) {
            // Filtra os dados do produto do banco de dados com base no ID do produto.
            $product = [...array_filter($productsInDataBase, fn($product) => (int)$product->id === $productId)];
            
            // Cria um array com informações sobre o produto e seu subtotal calculado.
            $products[] = [
                'id' => $productId,
                'product' => $product[0]->product,
                'price' => $product[0]->price,
                'qty' => $quantity,
                'subtotal' => $quantity * $product[0]->price
            ];
            
            // Atualiza o custo total com o subtotal do produto.
            $total += $quantity * $product[0]->price;
        }
       
        // Retorna um array contendo os dados dos produtos processados e o custo total.
        return [
            'products' => $products,
            'total' => $total
        ];
    }
}
