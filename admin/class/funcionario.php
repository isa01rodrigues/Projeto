<?php
require_once('conexao.php');

class funcionarioClass{
    public $idFuncionario;
    public	$nome;
    public	$funcao;	
    public $statusFuncionario;
    

    public function __construct($id = false)
    {
 
        if ($id) {
 
            $this->idFuncionario = $id;
            $this->Carregar();
        }
    }
   public function  ListarFuncionario(){
    $sql = "SELECT * FROM `tblfuncionario` WHERE statusFuncionario in ('ATIVO','DESATIVADO') ORDER BY FIELD(statusFuncionario, 'ATIVO','DESATIVADO') ASC;";
    $conn = ConexaoBd::LigarConexao() ;
    $resultado = $conn->query($sql) ;
    $lista =$resultado->fetchAll() ;
    return $lista;
   }

   //Responsavel de realizar o cadastro
   public function Cadastrar(){
    $query = "INSERT INTO `tblfuncionario`(`nome`, 
                             `funcao`, 
                             `statusFuncionario`)
 VALUES ('".$this->nome."',
        '".$this->funcao ."',
        '".$this-> statusFuncionario."');";
    $conn = ConexaoBd::LigarConexao();
    $conn->exec($query);

    echo "<script>document.location='index.php?p=funcionario&'</script>";
   }

   //Responsavel de carregar as informações
   public function Carregar(){
    $query = "SELECT * FROM tblfuncionario WHERE idFuncionario='".$this->idFuncionario."';";
    $conn = ConexaoBd::LigarConexao();
    $resultado = $conn->query($query);
    $lista = $resultado->fetchAll();

    foreach($lista as $linha){
        $this->idFuncionario = $linha['idFuncionario'];
        $this->nome = $linha['nome'];
        $this->funcao = $linha['funcao'];
        $this->statusFuncionario = $linha['statusFuncionario'];
    }
   }

   //Responsavel de atualizar o cadastro
   public function Atualizar() {
    $query = "UPDATE `tblfuncionario` SET `nome`= '".$this->nome."',
        `funcao`= '".$this->funcao."',
        `statusFuncionario`= '".$this->statusFuncionario."'

        WHERE idFuncionario = '".$this->idFuncionario."';";
        

        echo $query; // Adicione esta linha para depurar a instrução SQL

        $conn = ConexaoBd::LigarConexao();   
        $conn->query($query);
        echo "<script>document.location='index.php?p=funcionario'</script>";
   }

   public function desativar() {
    $sql = "UPDATE `tblfuncionario` SET statusFuncionario = 'DESATIVADO' WHERE idFuncionario = '" . $this->idFuncionario."';";
    $conn = ConexaoBd::LigarConexao();
    $conn->exec($sql);

    echo "<script>document.location='index.php?p=funcionario'</script>";
   }
        

}