<?php

namespace App\Entity;

use App\Db\Database;
use PDO;

class Noticia {
    public $id;
    public $titulo;
    public $conteudo;
    public $Categoria_id;

    public function cadastrar(){
        $obDatabase = new Database();

        $query = 'INSERT INTO noticia (id, titulo, conteudo, Categoria_id) VALUES (0, ?, ?, ?)';
        
        $params = [
            $this->titulo,
            $this->conteudo,
            $this->Categoria_id
        ];

        $this->id = $obDatabase->insert($query, $params);
    }

    public static function buscarTodas(){
        $query = 'SELECT * FROM noticia ORDER BY id DESC';

        return (new Database())->select($query)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function buscarPorFiltro($filtro){
        $query = 'SELECT noticia.id, noticia.titulo, noticia.conteudo, noticia.Categoria_id 
        FROM noticia INNER JOIN categoria 
        on noticia.Categoria_id = categoria.id 
        WHERE categoria.nome LIKE "%'. $filtro .'%" 
        OR noticia.titulo LIKE "%'. $filtro .'%" 
        OR noticia.conteudo LIKE "%'. $filtro .'"';

        return (new Database())->select($query)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

}