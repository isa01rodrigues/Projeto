<h2>Cadastre um novo Cliente</h2>
<?php

if (isset($_POST['nomeCliente'])) {
    $nomeCliente = $_POST['nomeCliente'];
    $cpfCliente = $_POST['cpfCliente'];
    $emailCliente = $_POST['emailCliente']; 
    $statusCliente = $_POST['statusCliente'];
   

    // Incluir a classe do cliente
    require_once('class/cliente.php');

    // Criar uma instância do cliente
    $cliente = new clienteClass();

    // Definir as propriedades do cliente
    $cliente->nomeCliente = $nomeCliente;
    $cliente->cpfCliente = $cpfCliente;
    $cliente->emailCliente = $emailCliente;
    $cliente->statusCliente = $statusCliente;
   

    // Chamar o método para cadastrar o cliente
    $cliente->cadastrarCliente();

    // Debug para verificar os dados enviados
    //var_dump($_POST);
}
?>
<section class="blocoForm">


        
<form class="formulario" action="index.php?p=cliente&c=cadastrar" method="POST" enctype="multipart/form-data">

    <div class="row g-3 needs-validation" >
    <div class="col-md-4">
    <label  class="form-label">Nome</label>
    <input type="text" class="form-control" id="nomeCliente
    " name="nomeCliente"  required>
   
  </div>

 
  <div class="col-md-6">
    <label  class="form-label">Cpf</label>
    <input type="text" class="form-control" id="cpfCliente" name="cpfCliente" required>
    
  </div>

  
  <div class="col-md-6">
    <label  class="form-label">E-mail</label>
    <input type="email" class="form-control" id="emailCliente" name="emailCliente" required>
    
  </div>

  <div class="col-md-3">
    <label  class="form-label">Status</label>
    <input type="text" class="form-control" id="statusCliente" name="statusCliente" required>
  
    </select>
  </div>

  <div class="col-12">
        <button  type="submit">Cadastrar</button>
      </div>
</form>

</section>