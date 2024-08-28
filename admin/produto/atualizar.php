<?php

$id = $_GET['id'];

require_once('class/produto.php');
$produtos = new produtoClass($id);

if (isset($_POST['produto'])) {
    $produto = $_POST['produto'];
    $categoria = $_POST['categoria'];
    $valorUnitario = $_POST['valorUnitario']; 
    $statusProduto = $_POST['statusProduto'];

    $produtos->produto = $produto;
    $produtos->categoria = $categoria;
    $produtos->valorUnitario = $valorUnitario;
    $produtos->statusProduto = $statusProduto;

    $produtos->atualizarProduto();
}

?>

<section class="blocoForm">


        
<form class="formulario" action="index.php?p=produto&pr=atualizar&id=<?php echo $produtos->idProduto; ?>"
 method="POST" enctype="multipart/form-data">

    <div class="row g-3 needs-validation" >
    <div class="col-md-4">
    <label  class="form-label">Produto</label>
    <input type="text" class="form-control" id="produto" name="produto" value="<?php echo $produtos->produto; ?>"  required>
   
  </div>

 
  <div class="col-md-6">
    <label  class="form-label">Categoria</label>
    <input type="text" class="form-control" id="categoria" name="categoria"     value="<?php echo $produtos->categoria; ?>"  required>
    
  </div>

  
  <div class="col-md-6">
    <label  class="form-label">Valor</label>
    <input type="text" class="form-control" id="valorUnitario" name="valorUnitario"  value="<?php echo $produtos->valorUnitario; ?>" required>
    
  </div>

  <div class="col-md-3">
    <label  class="form-label">Status</label>
    <input type="text" class="form-control" id="statusProduto" name="statusProduto"  value="<?php echo $produtos->statusProduto; ?>" required>
  
    </select>
  </div>

  <div class="col-12">
        <button  type="submit">ATUALIZAR</button>
      </div>
</form>

</section>