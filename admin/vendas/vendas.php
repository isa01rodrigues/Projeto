<h2 class ="h2">Pagina de Vendas</h2>
<?php

$pagina = @$_GET['v'];



if ($pagina == NULL) {
    require_once('listar.php');
} else {
    if ($pagina == 'cadastrar') {
        require_once('cadastrar.php');
    }
    if ($pagina == 'atualizar') {
        require_once('atualizar.php');
    }
    if ($pagina == 'desativar') {
        require_once('desativar.php');
    }
    if ($pagina == 'ativar') {
        require_once('ativar.php');
    } 
}