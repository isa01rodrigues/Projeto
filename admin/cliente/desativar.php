<h2>Página Desativar</h2>
<?php
require_once('class/cliente.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $cliente = new clienteClass();
    $cliente->idCliente = $id;
    $cliente->desativar();
}
