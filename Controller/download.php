<?php
   include_once "conexao.php";

    $sql = "SELECT * FROM tb_Venda"; // Substitua 'produtos' pelo nome da sua tabela
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        header('Content-type: text/csv; charset=UTF-8');

        header('Content-Disposition: attachment; filename=relatorio.csv');

       $resultado = fopen("php://output", 'w');


       $cabecalho = ['id', mb_convert_encoding('nome', 'ISO-8859-1', 'UTF-8'), 'preco', 'qtd', mb_convert_encoding('data_venda', 'ISO-8859-1', 'UTF-8')];

    fputcsv($resultado, $cabecalho, ';');

    while ($linha = $result->fetch_assoc()) {
        fputcsv($resultado, $linha, ';');
    }

    fclose($resultado);

    } else {
        echo "
            <script>
                alert('Nenhum registro encontrado');
                window.location.href='../imprimir.php';
            </script>        
        ";
    }

    $conn->close();
?>