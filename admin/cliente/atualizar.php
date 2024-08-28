<?php

$id = $_GET["id"];

require_once('class/cliente.php');
$cliente = new clienteClass($id);

if (isset($_POST['nomeCliente'])) {
    $nomeCliente = $_POST['nomeCliente'];
    $cpfCliente = $_POST['cpfCliente'];
    $emailCliente = $_POST['emailCliente']; 
    $statusCliente = $_POST['statusCliente'];

    // Definir as propriedades do cliente
    $cliente->nomeCliente = $nomeCliente;
    $cliente->cpfCliente = $cpfCliente;
    $cliente->emailCliente = $emailCliente;
    $cliente->statusCliente = $statusCliente;
   
    $cliente -> atualizarCliente();



}
?>

<section class="blocoForm">


        
<form class="formulario" action="index.php?p=cliente&c=atualizar&id=<?php echo $cliente->idCliente; ?>" method="POST" enctype="multipart/form-data">

    <div class="row g-3 needs-validation" >
    <div class="col-md-4">
    <label  class="form-label">Nome</label>
    <input type="text" class="form-control" id="nomeCliente" name="nomeCliente" value="<?php echo $cliente->nomeCliente; ?>"  required>
   
  </div>

 
  <div class="col-md-6">
    <label  class="form-label">Cpf</label>
    <input type="text" class="form-control" id="cpfCliente" name="cpfCliente" value="<?php echo $cliente->cpfCliente; ?>" required>
    
  </div>

  
  <div class="col-md-6">
    <label  class="form-label">E-mail</label>
    <input type="email" class="form-control" id="emailCliente" name="emailCliente"    value="<?php echo $cliente->emailCliente; ?>"  required>
    
  </div>

  <div class="col-md-3">
    <label  class="form-label">Status</label>
    <input type="text" class="form-control" id="statusCliente" name="statusCliente" value="<?php echo $cliente->statusCliente; ?>" required>
  
    </select>
  </div>

  <div class="col-12">
        <button  type="submit">Atualizar</button>
      </div>
</form>

</section>