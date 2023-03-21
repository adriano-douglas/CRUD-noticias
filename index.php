<?php

require __DIR__ . '/vendor/autoload.php';
use App\Entity\Noticia;

session_start();

if(isset($_GET['filter'])){
    if(!empty(trim($_GET['filter']))){
        $noticias = Noticia::buscarPorFiltro(trim($_GET['filter']));
    }else{
        $noticias = Noticia::buscarTodas();
    }
}else{
    $noticias = Noticia::buscarTodas();
}

require __DIR__ . '/includes/header-html.php';
require __DIR__ . '/includes/header-navbar.php';
require __DIR__ . '/includes/lista-noticias.php';
require __DIR__ . '/includes/footer.php';
require __DIR__ . '/includes/footer-html.php';
