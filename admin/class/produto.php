<?php

require_once('conexao.php');

class produtoClass{
    public $idProduto;

    public $produto;

    public $categoria;

    public $valorUnitario;

    public $statusProduto;

    
public function __construct($id = false)
{

    if ($id) {

        $this->idProduto = $id;
        $this->Carregar();
    }
}

//Listar os produtos
public function ListarProduto(){
    $sql = "SELECT * FROM `tblproduto` WHERE statusProduto in ('ATIVO','DESATIVADO') ORDER BY FIELD(statusProduto,'ATIVO', 'DESATIVADO') ASC;";
    $conn = ConexaoBd::LigarConexao();
    $resultado = $conn->query($sql);
    $lista = $resultado->fetchAll();
    return $lista;
}

//Cadastrar os produtos
public function Cadastrar(){
$sql = "INSERT INTO `tblproduto`(`produto`, `categoria`, `valorUnitario`, `statusProduto`) 
VALUES ('".$this->produto."','".$this->categoria."','".$this->valorUnitario."','".$this->statusProduto."');";

    $conn = ConexaoBd::LigarConexao();
    $resultado = $conn->query($sql);
    $lista = $resultado->fetchAll();
    return $lista;

}

public function Carregar(){
    $query = "SELECT * FROM tblproduto WHERE idProduto='".$this->idProduto."';";
    $conn = ConexaoBd::LigarConexao();
    $resultado = $conn->query($query);
    $lista = $resultado->fetchAll();

    foreach($lista as $linha){
        $this->idProduto = $linha['idProduto'];
        $this->produto = $linha['produto'];
        $this->categoria = $linha['categoria'];
        $this->valorUnitario = $linha['valorUnitario'];
        $this->statusProduto = $linha['statusProduto'];
    }
}



public function atualizarProduto(){
    $query = "UPDATE `tblproduto` SET `produto`= '".$this->produto."',
        `categoria`= '".$this->categoria."',
        `valorUnitario`= '".$this->valorUnitario."',
        `statusProduto`= '".$this->statusProduto."'

        WHERE `idProduto`= '".$this->idProduto."';";

        echo $query;

        $conn = ConexaoBd::LigarConexao();
        $conn->query($query);
        echo "<script>document.location='index.php?p=produto'</script>";

}

public function desativar(){
    $sql = "UPDATE tblproduto SET statusProduto = 'DESATIVADO' WHERE idProduto = '" . $this->idProduto ."';";
    $conn = ConexaoBd::LigarConexao();
    $conn->exec($sql);

    echo "<script>document.location='index.php?p=produto'</script>";
}



}