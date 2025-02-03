<?php
    include_once "conexao.php";


    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);
    $nome = filter_input(INPUT_GET, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $preco = str_replace(",", ".", filter_input(INPUT_GET, "preco", FILTER_SANITIZE_SPECIAL_CHARS));
    $qtd = filter_input(INPUT_GET, "qtd", FILTER_SANITIZE_SPECIAL_CHARS);
    $test = filter_input(INPUT_GET, "test", FILTER_SANITIZE_SPECIAL_CHARS);


  if ($id == $test) {
       $sql = "UPDATE tb_Produto SET nome = '$nome', preco = $preco, qtd = $qtd WHERE id = $id";
       $sqlentr = "UPDATE tb_Entrada SET qtd = $qtd WHERE id = $id";

        echo "<script>
                alert('Editado com Sucesso');
                window.location.href='../cadastro.php';
            </script>";
   } else {
       $sql = "INSERT INTO tb_Produto VALUES ($id, '$nome', $preco, $qtd)";
       $sqlentr = "INSERT INTO tb_Entrada VALUES ($id, $qtd)";

        echo "<script>
                alert('cadastro com Sucesso');
                window.location.href='../cadastro.php';
            </script>";
    }

    $inserir = mysqli_query($conn, $sql);
    $inter = $conn->query($sqlentr);
   

    $conn->close();
?>