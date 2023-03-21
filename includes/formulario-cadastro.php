<?php

    $msg = '';
    if(isset($_SESSION['error'])){
        $msg = '<div class="error"><span>Preencha todos os campos corretamente</span></div>';
        unset($_SESSION['error']);
    }else if(isset($_SESSION['success'])){
        $msg = '<div class="success"><span>Notícia cadastrada com sucesso!</span></div>';
        unset($_SESSION['success']);
    }

?>

<section class="form content">
    <?= $msg ?>

    <form action="cadastrar.php" method="post">
        <h3>Cadastro de notícias</h3>
        <input type="text" name="titulo" placeholder="Titulo da notícia">
        <input type="text" name="categoria" placeholder="Categoria da notícia">
        <textarea name="conteudo" id="" rows="7" placeholder="Conteudo da notícia"></textarea>
        <input type="submit" value="Cadastrar">
    </form>
</section>
