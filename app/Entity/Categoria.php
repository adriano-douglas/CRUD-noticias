<?php

namespace App\Entity;
use App\Db\Database;

class Categoria {
    public $id;
    public $nome;

    public function cadastrar(){
        $obDatabase = new Database();

        $query = 'INSERT INTO categoria (id, nome) VALUES (0, ?)';

        $params = [
            $this->nome
        ];

        $this->id =  $obDatabase->insert($query, $params);
        return true;
    }

    public static function buscarCategoria_idPorNome($nome){
        $query = 'SELECT id FROM categoria WHERE nome= ?';

        $params = [
            $nome
        ];

        return (new Database())->select($query, $params)->fetchObject(self::class);
    }
}