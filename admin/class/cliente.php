<?php
require_once('conexao.php');

class clienteClass{
public $idCliente;
public $nomeCliente;

public $cpfCliente;

public $emailCliente;

public $statusCliente;

public function __construct($id = false)
{

    if ($id) {

        $this->idCliente = $id;
        $this->Carregar();
    }
}


public function ListaCliente() {
    $sql = "SELECT * FROM `tblcliente` WHERE statusCliente in ('ATIVO','DESATIVADO') ORDER BY FIELD(statusCliente, 'ATIVO', 'DESATIVADO') ASC;";
    $conn = ConexaoBd::LigarConexao();
    $resultado = $conn->query($sql);
    $lista = $resultado->fetchAll();
    return $lista;
}
public function cadastrarCliente() {
    $sql = "INSERT INTO `tblcliente`( `nomeCliente`, `cpfCliente`, `emailCliente`, `statusCliente`) 
    VALUES ( '".$this->nomeCliente."', '".$this->cpfCliente."', '".$this-> emailCliente."', '".$this-> statusCliente."');";
    $conn = ConexaoBd::LigarConexao();
    $resultado = $conn->query($sql);
    $lista = $resultado->fetchAll();
    return $lista;
}

 //RESPONSAVEL DE PASSAR AS INFORMAÇÕES DO BANCO DE DADOS
 public function Carregar(){
    $query = "SELECT * FROM tblcliente WHERE idCliente='".$this->idCliente."';";
    $conn = ConexaoBd::LigarConexao();
    $resultado = $conn->query($query);
    $lista = $resultado->fetchAll();

    foreach($lista as $linha){
        $this->idCliente = $linha['idCliente'];
        $this->nomeCliente = $linha['nomeCliente'];
        $this->cpfCliente = $linha['cpfCliente'];
        $this->emailCliente = $linha['emailCliente'];
        $this->statusCliente = $linha['statusCliente'];
    }

}

public function atualizarCliente() {
    $query = "UPDATE `tblcliente` SET `nomeCliente`= '".$this->nomeCliente."',
        `cpfCliente`= '".$this->cpfCliente."',
        `emailCliente`= '".$this->emailCliente."',
        `statusCliente`= '".$this->statusCliente."'

        WHERE idCliente = '".$this->idCliente."';
        ";

        echo $query; // Adicione esta linha para depurar a instrução SQL
    
        $conn = ConexaoBd::LigarConexao();   
        $conn->query($query);
        echo "<script>document.location='index.php?p=cliente'</script>";
}

    public function desativar(){
        $sql = "UPDATE tblcliente SET statusCliente = 'DESATIVADO' WHERE idCliente = '" . $this->idCliente ."';";
        $conn = ConexaoBd::LigarConexao();
        $conn->exec($sql);
    
        echo "<script>document.location='index.php?p=cliente'</script>";
    }
    

}