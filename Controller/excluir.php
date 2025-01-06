<?php
    include_once "conexao.php";

    $codigo = filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);

    $sql = "DELETE FROM tb_Produto  WHERE ID = $codigo;";
    $inserir = $conn->query($sql);
    $sqlQtd = "DELETE FROM tb_Entrada  WHERE ID = $codigo;";

    $insQtd = $conn->query($sqlQtd);

    if ($inserir) {
        echo "
            <script>
                alert('Excluido com Sucesso');
                window.location.href='../cadastro.php';
            </script>        
        ";
            
    } else {
        echo "
            <script>
                alert('Erro ao Excluir');
                window.location.href='../cadastro.php';
            </script>        
        ";
    }
    $conn->close();

?>