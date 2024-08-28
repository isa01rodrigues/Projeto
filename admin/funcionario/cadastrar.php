<h2>Cadastre um novo Funcionario</h2>
<?php

if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $funcao = $_POST['funcao'];
    $statusfuncionario = $_POST['statusfuncionario'];
   

    // Incluir a classe do funcionario
    require_once('class/funcionario.php');

    // Criar uma instância do funcionario
    $funcionario = new funcionarioClass();

    // Definir as propriedades do funcionario
    $funcionario->nome = $nome;
    $funcionario->funcao = $funcao;
    $funcionario->statusFuncionario = $statusfuncionario;
   

    // Chamar o método para cadastrar o funcionario
   $funcionario->Cadastrar();

    // Debug para verificar os dados enviados
    var_dump($_POST);
}
?>

<section class="blocoForm">


        
<form class="formulario" action="index.php?p=funcionario&f=cadastrar" method="POST" enctype="multipart/form-data">

    <div class="row g-3 needs-validation" >
    <div class="col-md-4">
    <label  class="form-label">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome"  required>
   
  </div>

 
  <div class="col-md-6">
    <label  class="form-label">Função</label>
    <input type="text" class="form-control" id="funcao" name="funcao" required>
    
  </div>

  <div class="col-md-3">
    <label  class="form-label">Status</label>
    <input type="text" class="form-control" id="statusfuncionario" name="statusfuncionario" required>
  
    </select>
  </div>

  <div class="col-12">
        <button  type="submit">Cadastra Funcionario</button>
      </div>
</form>

</section>