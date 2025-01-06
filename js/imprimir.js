$(document).ready(function() {
    $("#btnImprimir").click(function() {
        var conteudo = document.getElementById('areaImpressao').innerHTML;
        var tabela = document.getElementById('tabela').innerHTML;
        var janelaImpressao = window.open('', '', 'height=600,width=800');

        janelaImpressao.document.write('<html><head><title>Imprimir</title></head><body>');
        janelaImpressao.document.write(conteudo);
        janelaImpressao.document.write(tabela);
        janelaImpressao.document.write('</body></html>');
        janelaImpressao.document.close();
        janelaImpressao.document.print();
    });
});