<h2>Página Desativar</h2>
<?php
require_once('class/vendas.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $vendas = new vendasClass();
    $vendas->idVenda = $id;
    $vendas->desativarVenda();
}
