<?php
include_once "Controller/conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/records.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>GStock</title>

    <script src="js/imprimir.js" defer></script>
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

    <div class="mt-5 container d-block">
        

        <div id="areaImpressao" class="d-flex justify-content-around mt-5 text-center">
            <h2>RELATÓRIO DE VENDAS DE PRODUTOS</h2>
        </div>
        <div class="d-flex justify-content-center mb-3">
            <button id="btnImprimir" class="btn btn-primary mr-2 mt-5">Imprimir</button>
            
            <a href="Controller/download.php">
                <button class="btn btn-success mr-2 mt-5">Baixar Relatorio</button>
            </a>

            <a href="Controller/reset_relatorio.php">
                <button id="btnImprimir" class="btn btn-danger mr-4 mt-5">Reset</button>
            </a>
        </div>
        
        
        <div id="tabela" class="d-flex float-right ml-auto mr-5 w-75 ">
            <table  class="mt-5 table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Preco</th>
                        <th>Qtd. Vendida</th>
                        <th>Data de Venda</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM tb_Venda"; // Substitua 'produtos' pelo nome da sua tabela
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($linha = $result->fetch_assoc()) {
                            echo " 
                                <tr>
                                    <td>" . $linha['id'] . "</td>
                                    <td>" . $linha['nome'] . "</td>
                                    <td>" . $linha['preco'] . "</td>
                                    <td>" . $linha['qtd'] . "</td>
                                    <td>" . $linha['data_venda'] . "</td>
                                </tr>
                            ";
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </div>

    <footer>
        
    </footer>

    <script>
       /*
       $(document).ready(function() {
            $("#btnImprimir").click(function() {
                window.print();
            });
        });
        */

        
    </script>

    <!-- Scripts Bootstrap do jQuery -->
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>