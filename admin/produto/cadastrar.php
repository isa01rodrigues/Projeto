<h2>Cadastre um novo produto</h2>
<?php
if (isset($_POST['produto'])) {
    $produto = $_POST['produto'];
    $categoria = $_POST['categoria'];
    $valorUnitario = $_POST['valorUnitario']; 
    $statusProduto = $_POST['statusProduto'];

    require_once('class/produto.php');

    $produtos = new produtoClass();

    $produtos->produto = $produto;
    $produtos->categoria = $categoria;
    $produtos->valorUnitario = $valorUnitario;
    $produtos->statusProduto = $statusProduto;

    $produtos->Cadastrar();

     // Debug para verificar os dados enviados
    //var_dump($_POST);
}

?>

<section class="blocoForm">


        
<form class="formulario" action="index.php?p=produto&pr=cadastrar" method="POST" enctype="multipart/form-data">

    <div class="row g-3 needs-validation" >
    <div class="col-md-4">
    <label  class="form-label">Produto</label>
    <input type="text" class="form-control" id="produto" name="produto"  required>
   
  </div>

 
  <div class="col-md-6">
    <label  class="form-label">Categoria</label>
    <input type="text" class="form-control" id="categoria" name="categoria" required>
    
  </div>

  
  <div class="col-md-6">
    <label  class="form-label">Valor</label>
    <input type="text" class="form-control" id="valorUnitario" name="valorUnitario" required>
    
  </div>

  <div class="col-md-3">
    <label  class="form-label">Status</label>
    <input type="text" class="form-control" id="statusProduto" name="statusProduto" required>
  
    </select>
  </div>

  <div class="col-12">
        <button  type="submit">Cadastrar</button>
      </div>
</form>

</section>