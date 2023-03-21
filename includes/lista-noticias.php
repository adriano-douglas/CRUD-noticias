<?php
    $resultado = '';
    foreach($noticias as $noticia){
        $resultado .= '<div class="noticia">
                            <div class="header">
                                <h3 class="title">'. $noticia->titulo .'</h3>
                                <p>'. $noticia->conteudo .'</p>
                            </div>
                            <div class="footer">
                                <a href="#"><button>Acessar</button></a>
                            </div>
                        </div>';
    }

    if(empty($noticias)){
        $resultado = '<p>Nenhuma notícia encontrada! :(</p>';
    }

?>

<section class="noticias content">

    <?= $resultado ?>

</section>
