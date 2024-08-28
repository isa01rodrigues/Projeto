<?php

require_once('conexao.php');

class pagamentoClass{
    
public $idPagamento;	
public $idVenda;	
public $FormaPagamento;	
public $subtotal;
public $quantidadeParcela;	
public $dataVencimento;	
public $valorParcela;

public function __construct($id = false)
{

    if ($id) {

        $this->idPagamento = $id;
        $this->Carregar();
    }
}
public function ListarPagamento(){
    $sql = "SELECT p.idPagamento AS idPagamento, p.FormaPagamento AS FormaPagamento, p.subtotal AS subtotal, p.quantidadeParcela AS quantidadeParcela, v.idVenda AS idVenda, v.statusVenda AS statusVenda, c.nomeCliente, prod.produto AS produto, p.valorParcela AS valorParcela, p.dataVencimento FROM tblpagamento p JOIN tblvenda v ON p.idVenda = v.idVenda JOIN tblvenda vp ON vp.idVenda = v.idVenda 
    JOIN tblproduto prod ON prod.idProduto = vp.idProduto JOIN tblcliente c ON c.idCliente = v.idCliente WHERE v.statusVenda = 'ATIVO';";
    $conn = ConexaoBd::LigarConexao();
    $resultado = $conn->query($sql);
    $lista = $resultado->fetchAll();
    return $lista;
 }

public function cadastrarPagamento(){
    $sql = "INSERT INTO `tblpagamento`( `idVenda`,
                           `FormaPagamento`, 
                           `subtotal`,
                           `quantidadeParcela`, 
                           `dataVencimento`, 
                           `valorParcela`) 
VALUES ('".$this-> idVenda."',
        '".$this-> FormaPagamento."',
        '".$this-> subtotal."',
        '".$this-> quantidadeParcela."',
        '".$this-> dataVencimento."',
        '".$this-> valorParcela."');";
   $conn = ConexaoBd::LigarConexao();
    $resultado = $conn->query($sql);
    $lista = $resultado->fetchAll();
    return $lista;
 }
 
 public function Carregar(){
    $query = "SELECT * FROM tblpagamento WHERE idPagamento='".$this->idPagamento."';";
    $conn = ConexaoBd::LigarConexao();
    $resultado = $conn->query($query);
    $lista = $resultado->fetchAll();

    foreach($lista as $linha){
        $this->idPagamento = $linha['idPagamento'];
        $this->idVenda = $linha['idVenda'];
        $this->FormaPagamento = $linha['FormaPagamento'];
        $this->subtotal = $linha['subtotal'];
        $this->quantidadeParcela = $linha['quantidadeParcela'];
        $this->dataVencimento = $linha['dataVencimento'];
        $this->valorParcela = $linha['valorParcela'];
      
}
}
public function atualizarPagamento(){
    $query = "
    UPDATE `tblpagamento` SET `idVenda`='".$this->idVenda."', 
    `FormaPagamento`= '".$this->FormaPagamento."', 
    `subtotal`='".$this->subtotal."',
     `quantidadeParcela`='".$this->quantidadeParcela."', 
     `dataVencimento`='".$this->dataVencimento."', 
    `valorParcela`= '".$this->valorParcela."' 
    WHERE idPagamento = '".$this->idPagamento."';
    ";

    echo $query; // Adicione esta linha para depurar a instrução SQL

    $conn = ConexaoBd::LigarConexao();   
    $conn->query($query);
    echo "<script>document.location='index.php?p=pagamento'</script>";
}




}
?>