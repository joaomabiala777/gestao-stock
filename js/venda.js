$(document).ready(function() {
    function atualizarPrecoTotal() {
        var preco = parseFloat($('#preco').val());
        var qtd = parseFloat($('#qtd').val());
        var precoTotal = preco * qtd;
        $('#precoTotal').val(precoTotal.toFixed(2));
    }
    
    $('.venda-btn').on('click', function () {
        var id = $(this).data('id');
        var nome = $(this).data('nome');
        var preco = $(this).data('preco');
        var quantidade = $(this).data('qtd');
        
        var dataAtual = new Date().toISOString().split('T')[0];
       
        // Preencher os campos do formulário com os dados do produto
        $('#modalVenda').text(nome);
        $('#id').val(id);
        $('#nome').val(nome);
        $('#preco').val(preco);
        $('#test').val(qtd);
        $('#quantidade').val(quantidade);
        $('#data').val(dataAtual);
        
    
        $('#OpenModal').modal('show');
    
    });
    // Atualiza o preço total quando a quantidade for alterada
    $('#qtd').on('input', function() {
        atualizarPrecoTotal();
    });
    
});
