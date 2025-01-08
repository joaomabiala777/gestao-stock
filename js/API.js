// Abrir o modal para adicionar um novo produto
$('#addProductBtn').click(function() {
    $('#modalTitle').text('Adicionar Produto');
    $('#productForm')[0].reset();
    $('#id').val('');
    $('#productModal').modal('show');
});

// Abrir o modal para editar um produto existente
$(document).on('click', '.edit-btn', function() {
    var id = $(this).data('id');
    var nome = $(this).data('nome');
    var preco = $(this).data('preco');
    var qtd = $(this).data('qtd');

    // Preencher os campos do formulário com os dados do produto
    $('#modalTitle').text('Editar Produto');
    $('.btnOnly').prop('readonly', true);
    $('#id').val(id);
    $('#nome').val(nome);
    $('#preco').val(preco);
    $('#qtd').val(qtd);
    $('#test').val(id);
    $('#addProductBtn').prop('readonly', false);

    $('#productModal').modal('show');
});
