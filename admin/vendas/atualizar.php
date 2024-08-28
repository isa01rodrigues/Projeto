<?php
$id = $_GET['id'];

require_once('class/vendas.php');
$vendas = new vendasClass($id);

if(isset($_POST['quantidade'])) {
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor'];
    $subtotal = $_POST['subtotal']; 
    $idCliente = $_POST['idCliente'];
    $idFuncionario = $_POST['idFuncionario'];
    $idProduto = $_POST['idProduto'];
    $statusVenda = $_POST['statusVenda'];

    $vendas->quantidade = $quantidade;
    $vendas->valor = $valor;
    $vendas->subtotal = $subtotal;
    $vendas->idCliente = $idCliente;
    $vendas->idFuncionario = $idFuncionario;
    $vendas->idProduto = $idProduto;
    $vendas->statusVenda = $statusVenda;

    $vendas -> atualizarVendas();
}

?>
<section class="blocoForm">
       
       <form class="formulario" action="index.php?p=vendas&v=atualizar&id=<?php echo $vendas->idVenda; ?>" method="POST" enctype="multipart/form-data">
       
       
      
       <div class="col-md-4">
                    <label class="form-label">Produto</label>
                    <input type="number" class="form-control" id="idProduto" name="idProduto"  value="<?php echo $vendas->idProduto; ?>" required>  
                   
    </div>
           <div class="row g-3 needs-validation" >
                   <div class="col-md-4">
                   <label  class="form-label">Quantidade</label>
                   <input type="number" class="form-control" id="quantidade" name="quantidade"  value="<?php echo $vendas->quantidade; ?>" required>  
         </div>
       
        
         <div class="col-md-6">
           <label  class="form-label">Valor</label>
           <input type="text" class="form-control" id="valor" name="valor"   value="<?php echo $vendas->valor; ?>"        required>
           
         </div>
       
         
         <div class="col-md-6">
           <label  class="form-label">Subtotal</label>
           <input type="text" class="form-control" id="subtotal" name="subtotal"     value="<?php echo $vendas->subtotal; ?>"    required>
           
         </div>
       
          
         <div class="col-md-6">
           <label  class="form-label">Cliente</label>
           <input type="text" class="form-control" id="idCliente" name="idCliente" value="<?php echo $vendas->idCliente; ?>" required>
           
         </div>
       
          
         <div class="col-md-6">
           <label  class="form-label">Funcionario</label>
           <input type="text" class="form-control" id="idFuncionario" name="idFuncionario" value="<?php echo $vendas->idFuncionario; ?>" required>
           
         </div>
       
       
       
         <div class="col-md-3">
           <label  class="form-label">Status</label>
           <input type="text" class="form-control" id="statusVenda" name="statusVenda" value="<?php echo $vendas->statusVenda; ?>" required>
         
           </select>
         </div>
       
         <div class="col-12">
               <button  type="submit">Cadastrar</button>
             </div>
       </form>
       
       </section>