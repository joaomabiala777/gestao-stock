<?php
    include_once "conexao.php";

    // $data = filter_input(INPUT_GET, "data", FILTER_SANITIZE_SPECIAL_CHARS);    
    $quantidade = filter_input(INPUT_GET, "quantidade", FILTER_SANITIZE_SPECIAL_CHARS);    
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);
    $nome = filter_input(INPUT_GET, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $preco = str_replace(",", ".", filter_input(INPUT_GET, "precoTotal", FILTER_SANITIZE_SPECIAL_CHARS));
    $qtd = filter_input(INPUT_GET, "qtd", FILTER_SANITIZE_SPECIAL_CHARS);
    $test = filter_input(INPUT_GET, "test", FILTER_SANITIZE_SPECIAL_CHARS);

    $quant = $quantidade - $qtd;

    $sql = "INSERT INTO tb_Venda VALUES (null,'$nome', $preco, $qtd, null)";   
    $inserir = mysqli_query($conn, $sql);
    
    $sql2 = "UPDATE tb_Produto SET nome = '$nome', qtd = $quant WHERE id = $id";   
    $vender = mysqli_query($conn, $sql2);

  if ($quant <= 0) {
    $sql3 = "DELETE FROM tb_Produto WHERE id = $id";   
    
    echo "<script>
                alert('Vendido com Sucesso');
                window.location.href='../venda.php';
            </script>";
    
    } else {
        echo "<script>
                alert('Vendido com Sucesso');
                window.location.href='../venda.php';
            </script>";
    }
    $delte = mysqli_query($conn, $sql3);

    $conn->close();
?>