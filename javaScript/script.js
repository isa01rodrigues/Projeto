console.log("sua pagina vendas")

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

document.addEventListener("DOMContentLoaded", function() {
    fetch('buscar.php')
        .then(response => response.json())
        .then(data => {
            const clienteSelect = document.getElementById("cliente");
            const produtoSelect = document.getElementById("produto");

            // Preencher opções de clientes
            data.clientes.forEach(cliente => {
                const option = document.createElement("option");
                option.value = cliente.id;
                option.textContent = cliente.nome;
                clienteSelect.appendChild(option);
            });

            // Preencher opções de produtos
            data.produtos.forEach(produto => {
                const option = document.createElement("option");
                option.value = produto.id;
                option.textContent = `${produto.nome} - R$ ${produto.preco.toFixed(2)}`;
                produtoSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Erro ao buscar dados:', error));
});

function atualizarValor() {
    var selectProduto = document.getElementById('idProduto');
    var valor = selectProduto.options[selectProduto.selectedIndex].getAttribute('data-preco');
    document.getElementById('valorUnitario').value = valor;
}
