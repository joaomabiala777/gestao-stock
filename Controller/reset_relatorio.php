    <?php
    include_once "conexao.php";


    $sqlVend = "DELETE FROM tb_Venda";
    $sqlQtd = "DELETE FROM tb_Entrada";

    $inserir = $conn->query($sqlVend);
    $insertQtd = $conn->query($sqlQtd);
    
    if ($inserir) {
        echo "
            <script>
                alert('Reiniciado com Sucesso');
                window.location.href='../imprimir.php';
            </script>        
        ";
            
    } else {
        echo "
            <script>
                alert('Erro ao Excluir');
                window.location.href='../imprimir.php';
            </script>        
        ";
    }
    $conn->close();

?>   