<h2>Página Desativar</h2>
<?php
require_once('class/funcionario.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $funcionario = new funcionarioClass();
    $funcionario->idFuncionario = $id;
    $funcionario->desativar();
}
