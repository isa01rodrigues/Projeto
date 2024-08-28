<h2>Página Desativar</h2>
<?php
require_once('class/produto.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $produtos = new produtoClass();
    $produtos->idProduto = $id;
    $produtos->desativar();
}
