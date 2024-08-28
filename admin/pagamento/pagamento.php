<h2 class ="h2">Pagina Pagamentos</h2>
<?php

$pagina = @$_GET['pag'];



if ($pagina == NULL) {
    require_once('listar.php');
} else {
    if ($pagina == 'cadastrar') {
        require_once('cadastrar.php');
    }
 
   
}