<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/stely.css">
</head>
<body>
    
<section class="bloco">
    <section class="conteudo">
    <div>
                    <ul>
                        <li><a href="index.php?p=dashboard" class="<?php echo (@$_GET['p'] == 'dashboard') ? 'menuAtivo' : ''; ?>">DASHBOARD</a></li>
                        
                        <li><a href="index.php?p=funcionario" class="<?php echo (@$_GET['p'] == 'funcionario') ? 'menuAtivo' : ''; ?>">FUNCIONARIO</a></li>
                        <li><a href="index.php?p=cliente" class="<?php echo (@$_GET['p'] == 'cliente') ? 'menuAtivo' : ''; ?>">CLIENTE</a></li>
                        <li><a href="index.php?p=produto" class="<?php echo (@$_GET['p'] == 'produto') ? 'menuAtivo' : ''; ?>">PRODUTOS</a></li>
                        <li><a href="index.php?p=vendas" class="<?php echo (@$_GET['p'] == 'vendas') ? 'menuAtivo' : ''; ?>">VENDAS</a></li>
                        <li><a href="index.php?p=pagamento" class="<?php echo (@$_GET['p'] == 'pagamento') ? 'menuAtivo' : ''; ?>">PAGAMENTO</a></li>
                    </ul>
                </div>

    </section>
</section>

<main>
<section class="BOX">

        <div class="box">
            <!--echo  '<h2>'.$pagina. '<h2>';-->
            <?php

            $pagina = @$_GET['p'];

            switch ($pagina) {

                case 'dashboard':
                    require_once('dashboard/painel.php');
                    break;


                    
                case 'funcionario':
                    require_once('funcionario/funcionario.php');
                    break;


                case 'cliente':
                    require_once('cliente/cliente.php');
                    break;


                case 'produto':
                  require_once('produto/produto.php');
                    break;

                
                    case 'vendas':
                        require_once('vendas/vendas.php');
                    break; 
                    
                    case 'pagamento':
                     require_once('pagamento/pagamento.php');

                default:
                    echo 'PG DASHBOARD';
                    break;
            }

            ?>

        </div>

</section>


</main>
</body>
</html>