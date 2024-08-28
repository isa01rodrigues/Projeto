<?php

require_once('conexao.php');

class vendasClass{
    public $idVenda;

    public $quantidade;

    public $valor;
    public $subtotal;

    public $statusVenda;
    public	$idCliente;
    public	$idFuncionario;
    public	$idProduto;	

    public function __construct($id = false)
{

    if ($id) {

        $this->idVenda = $id;
        $this->Carregar();
    }
}

 public function ListarVendas(){
    $sql = "SELECT tblvenda.idVenda, tblvenda.quantidade, tblvenda.valor, tblvenda.subtotal, tblproduto.produto, tblcliente.nomeCliente, tblfuncionario.nome AS nome, tblvenda.statusVenda FROM tblvenda JOIN tblproduto ON tblvenda.idProduto = tblproduto.idProduto JOIN tblcliente ON tblvenda.idCliente = tblcliente.idCliente JOIN tblfuncionario ON tblvenda.idFuncionario = tblfuncionario.idFuncionario;";
    $conn = ConexaoBd::LigarConexao();
    $resultado = $conn->query($sql);
    $lista = $resultado->fetchAll();
    return $lista;
 }

 public function cadastrarVenda(){
    $sql = "INSERT INTO `tblvenda`( `quantidade`, `valor`, `subtotal`, `statusVenda`, `idCliente`, `idFuncionario`, `idProduto`) 
    VALUES ('".$this-> quantidade."','".$this-> valor."','".$this-> subtotal."','".$this-> statusVenda."','".$this->idCliente."','".$this-> idFuncionario."','".$this->idProduto."');";
   
   $conn = ConexaoBd::LigarConexao();
    $resultado = $conn->query($sql);
    $lista = $resultado->fetchAll();
    return $lista;
 }
 
public function Carregar(){
    $query = "SELECT * FROM tblvenda WHERE idVenda='".$this->idVenda."';";
    $conn = ConexaoBd::LigarConexao();
    $resultado = $conn->query($query);
    $lista = $resultado->fetchAll();

    foreach($lista as $linha){
        $this->idVenda = $linha['idVenda'];
        $this->quantidade = $linha['quantidade'];
        $this->valor = $linha['valor'];
        $this->subtotal = $linha['subtotal'];
        $this->statusVenda = $linha['statusVenda'];
        $this->idCliente = $linha['idCliente'];
        $this->idFuncionario = $linha['idFuncionario'];
        $this->idProduto = $linha['idProduto'];
    }
}
public function atualizarVendas(){
    $query = "UPDATE `tblvenda` SET `quantidade`= '".$this->quantidade."', 
    `valor`= '".$this->valor."', 
    `subtotal`= '".$this->subtotal."',
     `statusVenda`= '".$this->statusVenda."',
      `idCliente`= '".$this->idCliente."', 
      `idFuncionario`= '".$this->idFuncionario."', 
      `idProduto`= '".$this->idProduto."' 
    WHERE idVenda = '".$this->idVenda."';
    ";

    echo $query; // Adicione esta linha para depurar a instrução SQL

    $conn = ConexaoBd::LigarConexao();   
    $conn->query($query);
    echo "<script>document.location='index.php?p=vendas'</script>";
}

public function desativarVenda(){
    $sql = "UPDATE tblvenda SET statusVenda = 'DESATIVADO' WHERE idVenda = '" . $this->idVenda ."';";
    $conn = ConexaoBd::LigarConexao();
    $conn->exec($sql);

    echo "<script>document.location='index.php?p=vendas'</script>";
}






}

