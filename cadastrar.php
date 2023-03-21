<?php

session_start();

require __DIR__ . '/vendor/autoload.php';
use App\Entity\Noticia;
use App\Entity\Categoria;

if(isset($_POST['titulo'], $_POST['categoria'], $_POST['conteudo'])){
    if(!empty(trim($_POST['titulo'])) && !empty(trim($_POST['categoria'])) && !empty(trim($_POST['conteudo']))){
        $obCategoria = Categoria::buscarCategoria_idPorNome($_POST['categoria']);

        $obNoticia = new Noticia();
        $obNoticia->titulo = $_POST['titulo'];
        $obNoticia->conteudo = $_POST['conteudo'];

        if($obCategoria instanceof Categoria){
            $obNoticia->Categoria_id = $obCategoria->id;
        }else{
            $obCategoria = new Categoria();
            $obCategoria->nome = $_POST['categoria'];
            $obCategoria->cadastrar();
            $obNoticia->Categoria_id = $obCategoria->id;
        }
        $obNoticia->cadastrar();
        $_SESSION['success'] = true;
    }else{
        $_SESSION['error'] = true;
    }
}

require __DIR__ . '/includes/header-html.php';
require __DIR__ . '/includes/header-navbar.php';
require __DIR__ . '/includes/formulario-cadastro.php';
require __DIR__ . '/includes/footer.php';
require __DIR__ . '/includes/footer-html.php';