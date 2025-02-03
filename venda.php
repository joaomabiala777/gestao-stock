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
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/records.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>GStock</title>
    <script src="js/venda.js" defer></script>
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
          <li><a href="sair.php"><i class="fa fa-sign-out text-primary mr-2" aria-hidden="true"></i>Sair</a></li>
        </ul>
      </div>
      
    <main>
        <div class="d-flex w-75 float-right mb-3">
            <form class="form-inline w-75 my-2 my-lg-0">

                <div class="input-group w-100">
                    <input class="form-control" type="search" id="pesquisar" placeholder="Pesquisar">
                    <div class="input-group-append">
                        <button onclick="searchData()" class="btn btn-outline-primary" type="button" id="searchBtn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>


                </div>
            </form>
        </div>

        <table id="tableVenda" class="records" id="productTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Preco</th>
                    <th>Qtd</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if (!empty($_GET['search'])) {
                    $data = $_GET['search'];

                    $sql = "SELECT * FROM tb_Produto WHERE id LIKE '%$data%' or nome LIKE '%$data%' or preco LIKE '%$data%' or qtd LIKE '%$data%' ";
                } else {
                    $sql = "SELECT * FROM tb_Produto";
                }

                // Substitua 'produtos' pelo nome da sua tabela

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($linha = $result->fetch_assoc()) {
                        echo " 
                                <tr>
                                    <td>" . $linha['id'] . "</td>
                                    <td>" . $linha['nome'] . "</td>
                                    <td>" . $linha['preco'] . "</td>
                                    <td>" . $linha['qtd'] . "</td>
                                    <td>
                                        <button class='btn btn-outline-primary venda-btn' data-id='{$linha['id']}' data-nome='{$linha['nome']}' data-preco='{$linha['preco']}' data-qtd='{$linha['qtd']}'>Vender</button>
                                    </td>
                                </tr>
                            ";
                    }
                }

                ?>
            </tbody>
        </table>
        <table class="records">
            <thead>
                <tr>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                </tr>
            </thead>
        </table>
        <!-- Modal de Adicionar/Editar Produto -->
        <div class="modal fade" tabindex="-1" role="dialog" id="OpenModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title w-100 text-center text-white" id="modalVenda">Vender Produto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="GET" action="Controller/vender.php" id="productForm">
                            <div class="form-group w-50">
                                <label for="data">Data de Venda</label>
                                <input type="date" class="form-control" id="data" name="data" readonly>
                            </div>
                            <div class="form-group">
                                <label for="id">ID</label>
                                <input type="text" class="form-control" id="id" name="id" readonly>
                            </div>
                            <input type="hidden" class="form-control" id="nome" name="nome" readonly>
                            <div class="form-group">
                                <label for="qtd">Quantidade</label>
                                <input type="number" class="form-control" id="qtd" name="qtd">
                            </div> 
                                <input type="hidden" class="form-control" id="preco" name="preco" readonly>
                                <input type="hidden" class="form-control" id="quantidade" name="quantidade" readonly>
                            
                             <div class="form-group">
                                <label for="precoTotal">Preço</label>
                                <input type="text" class="form-control" id="precoTotal" name="precoTotal" readonly>
                             </div>
                            
                            <input type="hidden" class="form-control" id="test" name="test">
                            <button type="submit" class="btn btn-success">Concluir</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Fechar">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        Copyright &copy; João Cumbo M. Mabiala
    </footer>
    <script>
        var search = document.getElementById('pesquisar');

        search.addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                searchData();
            }
        });

        function searchData() {
            window.location = "venda.php?search=" + search.value;
        }
    </script>

    <!-- Scripts Bootstrap do jQuery -->
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>