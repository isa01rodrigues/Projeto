<h2>Cadastre um Pagamento</h2>

<?php
if (isset($_POST['FormaPagamento'])) {
    $FormaPagamento = $_POST['FormaPagamento'];
    $idVenda = $_POST['idVenda'];
    $subtotal  = $_POST['subtotal'];
    $quantidadeParcela = $_POST['quantidadeParcela']; 
    $dataVencimento = $_POST['dataVencimento'];
    $valorParcela = $_POST['valorParcela'];

    require_once('class/pagamento.php');

    $pagamento = new pagamentoClass();

    $pagamento->FormaPagamento = $FormaPagamento;
    $pagamento->idVenda = $idVenda;
    $pagamento->subtotal  = $subtotal;
    $pagamento->quantidadeParcela = $quantidadeParcela;
    $pagamento->dataVencimento = $dataVencimento;
    $pagamento->valorParcela = $valorParcela;

    $pagamento->cadastrarPagamento();

     // Debug para verificar os dados enviados
    //var_dump($_POST);
}

?>

<section class="blocoForm">
       
<form class="formulario" action="index.php?p=pagamento&pag=cadastrar" method="POST" enctype="multipart/form-data">


<div class="row g-3 needs-validation" >
            <div class="col-md-4">
            <label  class="form-label">Pagamento</label>
            <input type="text" class="form-control" id="FormaPagamento" name="FormaPagamento"  required placeholder="Forma de Pagamento">  
            
  </div>
    <div class="row g-3 needs-validation" >
            <div class="col-md-4">
            <label  class="form-label">Venda</label>
            <input type="text" class="form-control" id="idVenda" name="idVenda"  required placeholder="Id Venda">  
  </div>

  <div class="col-md-6">
    <label  class="form-label">Quantidade</label>
    <input type="number" name="quantidadeParcela" id="quantidadeParcela" placeholder="Quantidade de Parcelas">
    
  </div>

 
  <div class="col-md-6">
    <label  class="form-label">Subtotal</label>
    <input type="text" name="subtotal" id="subtotal" placeholder="Subtotal">
    
  </div>

  
 
   
  <div class="col-md-6">
    <label  class="form-label"> Vencimento</label>
    <input type="date" class="form-control" id="dataVencimento" name="dataVencimento" required>
    
  </div>

   
  <div class="col-md-6">
    <label  class="form-label">Parcelas</label>
    <input type="text" class="form-control" id="valorParcela" name="valorParcela" required>
    
  </div>



  <div class="col-12">
        <button  type="submit">Cadastrar</button>
      </div>
</form>

</section>
<script>
  // Função para calcular o valor das parcelas
  function calcularValorParcela() {
    var subtotal = parseFloat(document.getElementById('subtotal').value.replace(',', '.'));
    var quantidadeParcela = parseInt(document.getElementById('quantidadeParcela').value);
    var valorParcela = 0;

    // Verifica se os valores são válidos e calcula o valor da parcela
    if (!isNaN(subtotal) && quantidadeParcela > 0) {
      valorParcela = subtotal / quantidadeParcela;
    }

    // Exibe o valor da parcela no campo correspondente
    document.getElementById('valorParcela').value = valorParcela.toFixed(2).replace('.', ',');
  }

  // Adiciona eventos para recalcular o valor das parcelas quando o subtotal ou a quantidade de parcelas mudar
  document.getElementById('subtotal').addEventListener('input', calcularValorParcela);
  document.getElementById('quantidadeParcela').addEventListener('input', calcularValorParcela);
</script>