// Função para somar os valores nas células <td>
function calcularTotal() {
    var total = 0;
    var totalEntr = 0;
    // Obter todas as células com a classe 'valor'
    var valores = document.querySelectorAll('.valor');
    var entr = document.querySelectorAll('.entrada');
    
    // Somar os valores encontrados nas células
    valores.forEach(function(td) {
        total += parseFloat(td.innerText); // Somar o número de cada <td>
    });

    entr.forEach(function(td) {
        totalEntr += parseFloat(td.innerText);
    });
    
    // Exibir o total no campo de entrada
    document.getElementById('total').value = total.toFixed(2);
    document.getElementById('entrada').value = totalEntr.toFixed(2);
}

// Chamar a função ao carregar a página para calcular o total
window.onload = calcularTotal;