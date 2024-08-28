<?php

if (isset($_POST['quantidade'])) {
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor'];
    $subtotal = $_POST['subtotal']; 
    $idCliente = $_POST['idCliente'];
    $idFuncionario = $_POST['idFuncionario'];
    $idProduto = $_POST['idProduto'];
    $statusVenda = $_POST['statusVenda'];

    require_once('class/vendas.php');

    $vendas = new vendasClass();

    $vendas->quantidade = $quantidade;
    $vendas->valor = $valor;
    $vendas->subtotal = $subtotal;
    $vendas->idCliente = $idCliente;
    $vendas->idFuncionario = $idFuncionario;
    $vendas->idProduto = $idProduto;
    $vendas->statusVenda = $statusVenda;

    // Chamar o método para cadastrar o cliente
    $vendas->cadastrarVenda();

    // Debug para verificar os dados enviados
    //var_dump($_POST);
}
?>

<section class="blocoForm">
       
<form class="formulario" action="index.php?p=vendas&v=cadastrar" method="POST" enctype="multipart/form-data">


<div class="row g-3 needs-validation" >
            <div class="col-md-4">
            <label  class="form-label">Produto</label>
            <input type="text" class="form-control" id="idProduto" name="idProduto"  required>  
            
  </div>
    <div class="row g-3 needs-validation" >
            <div class="col-md-4">
            <label  class="form-label">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade"  required>  
  </div>

 
  <div class="col-md-6">
    <label  class="form-label">Valor</label>
    <input type="text" class="form-control" id="valor" name="valor" required>
    
  </div>

  
  <div class="col-md-6">
    <label  class="form-label">Subtotal</label>
    <input type="text" class="form-control" id="subtotal" name="subtotal" required>
    
  </div>

   
  <div class="col-md-6">
    <label  class="form-label">Cliente</label>
    <input type="text" class="form-control" id="idCliente" name="idCliente" required>
    
  </div>

   
  <div class="col-md-6">
    <label  class="form-label">Funcionario</label>
    <input type="text" class="form-control" id="idFuncionario" name="idFuncionario" required>
    
  </div>



  <div class="col-md-3">
    <label  class="form-label">Status</label>
    <input type="text" class="form-control" id="statusVenda" name="statusVenda" required>
  
    </select>
  </div>

  <div class="col-12">
        <button  type="submit">Cadastrar</button>
      </div>
</form>

</section>


<script src="../javaScript/script.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Função para calcular o subtotal
    function atualizarSubtotal() {
        var valor = parseFloat(document.getElementById("valor").value) || 0;
        var quantidade = parseInt(document.getElementById("quantidade").value) || 0;
        var subtotal = valor * quantidade;
        document.getElementById("subtotal").value = subtotal.toFixed(2); // Atualiza o campo subtotal
    }

    // Atualizar subtotal quando o valor ou a quantidade mudar
    document.getElementById("valor").addEventListener("input", atualizarSubtotal);
    document.getElementById("quantidade").addEventListener("input", atualizarSubtotal);
});
</script>
