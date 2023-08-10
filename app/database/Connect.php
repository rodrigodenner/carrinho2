<?php

namespace app\database;

use PDO;
use PDOException;

class Connect
{
    // Propriedade estática para armazenar a conexão PDO
    private static $pdo = null;
    
    // Método estático para estabelecer a conexão com o banco de dados
    public static function connect(){
        try {
            // Verifica se já existe uma conexão ativa
            if(!static::$pdo){
                // Criação da conexão PDO com as informações do banco de dados
                static::$pdo = new PDO('mysql:host=localhost;dbname=cart','capivara','15080911',[
                    // Opção: Resultados de busca retornados como objetos
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ]);
            }
        } catch (PDOException $e) {
            // Em caso de erro, mostra a mensagem de exceção
            var_dump($e->getMessage());
        }
        // Retorna a conexão estabelecida (ou vazia em caso de erro)
        return static::$pdo;
    }
}
