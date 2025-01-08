<?php
include_once "controller/conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/records.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>GStock</title>
    <script src="js/total.js"></script>
</head>

<body>
    <header class="p-3">
        <h1 class="header-title">Software de Gestão de Stock</h1>
    </header>
    <div class="sidebar">
        <h2>Menu Principal</h2>
        <ul>
          <li> <a href="index.php">
          <i class="fa-solid fa-tachometer-alt text-primary mr-2" ></i>DashBord</a>
          </li>
          <li><a href="cadastro.php">
          <i class="fa-solid fa-clipboard text-primary mr-2"></i>Cadastro</a></li>
          <li><a href="venda.php">
          <i class="fa-solid fa-money-bill-1 text-primary mr-2"></i>Venda</a></li>
          <li><a href="stock.php">
          <i class="fa fa-line-chart text-primary mr-2"></i>Em Stock</a></li>
          <li><a href="#">Sair</a></li>
        </ul>
      </div>

    <main>
        <a href="imprimir.php">
            <button type="button" class="btn btn-success btn-md mb-3 text-white">Gerar Relatório</button>
        </a>

        <table id="tableProduto" class="records">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Qtd</th>
                    <th>Preço Unitário</th>
                    <th>Preço em Stock</th>
                </tr>

            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tb_Produto"; // Substitua 'produtos' pelo nome da sua tabela
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($linha = $result->fetch_assoc()) {
                        echo " 
                            <tr>
                                <td>" . $linha['id'] . "</td>
                                <td>" . $linha['nome'] . "</td>
                                <td>" . $linha['qtd'] . "</td>
                                <td>" . $linha['preco'] . "</td>
                                 <td class='valor'>" . $precoStock = $linha['qtd'] * $linha['preco'] . "</td>
                            </tr>                            
                        ";
 
                    }
                } else {
                    echo "Nenhum produto encontrado.";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <table class="records">
            <thead>
                <tr>
                    <th> TOTAL </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th>
                        <input type="text" class="form-control w-50 mr-2 d-flex float-right" id="total" name="total" value="0.00" readonly>
                    </th>
                </tr>
            </thead>
        </table>

    </main>
    <footer>
        Copyright &copy; João Cumbo M. Mabiala
    </footer>

    <!-- Scripts Bootstrap do jQuery -->
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>