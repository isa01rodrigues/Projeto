<?php 

class ConexaoBd{
    public static function LigarConexao(){
        $conn = new PDO('mysql:dbname=dbgerenciamento;host=localhost', 'root', '');
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
}

?>