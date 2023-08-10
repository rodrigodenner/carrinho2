<?php

namespace app\database\models;

use app\database\Connect;

// Classe abstrata que serve como base para modelos (entidades) de dados
abstract class Model
{
    // Propriedade para armazenar a conexão com o banco de dados
    protected $connect;
    
    // Construtor da classe
    public function __construct()
    {
        // Estabelece a conexão com o banco de dados usando o método connect() da classe Connect
        $this->connect = Connect::connect();
    }
}
