<?php
    include_once "Controller/conexao.php";


    

    $enter = "SELECT * FROM tb_Entrada";
    $resultQtd = $conn->query($enter);

    // Inicializar uma variável para o total
    $totalQtd = 0;

    // Vetor para armazenar os totais
    $totaisQtd = array();


    while ($linha = $resultQtd->fetch_assoc()){
         $qtdEntr = $linha['qtd'];
         $totalProdutoQtd = $qtdEntr;  // Calcula o total de venda
    
        // Adiciona o total do produto ao total geral
        $totalQtd += $totalProdutoQtd;
    
        // Adiciona o total do produto ao vetor para o Chart.js
        $totaisQtd[] = $totalQtd;
    }
       
    


// Total de Vendas
    $sqlv = "SELECT * FROM tb_Venda";
    $resultVend = $conn->query($sqlv);

    // Inicializar uma variável para o total
    $totalVenda = 0;

    // Vetor para armazenar os totais
    $totaisVend = array();

    // Loop para calcular o total de cada produto
    while ($linha = $resultVend->fetch_assoc()) {
        $qtdVenda = $linha['qtd'];  // Quantidade de venda
        // $precoVenda = $linha['preco'];  // Preço de venda
        $totalProdutoVenda = $qtdVenda;  // Calcula o total de venda
    
        // Adiciona o total do produto ao total geral
        $totalVenda += $totalProdutoVenda;
    
        // Adiciona o total do produto ao vetor para o Chart.js
        $totaisVend[] = $totalProdutoVenda;
    }

// Passar os dados do vetor para o JavaScript
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
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <title>GStock</title>
    
    <script src="js/chart.js"></script>
    
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
        <div class="d-flex w-100 justify-content-around">
            <div class="shadow-lg badge py-1 px-5 mr-4 mb-5 rounded entrada">
                <h4>Entrada</h4>
                <p class="entrada"><?php
                    echo $totalQtd;
                ?></p>
            </div>
            <div class="shadow-lg badge py-1 px-5 mr-4 mb-5 rounded saida">
                <h4>Saída</h4>
                <p class="saida"><?php                
                    echo $totalVenda; 
                 ?></p>
            </div>

            <div class="shadow-lg badge py-1 px-5 mr-4 mb-5 rounded total">
                <h4>Total</h4>
                <p class="total"> <?php
                $totalMax = 0;
                $totalMax = $totalQtd - $totalVenda;
                 echo $totalMax; 
                ?> </p>
            </div>
        </div>
        <div class="d-flex h-50 w-100 justify-content-around">
        <div class="card w-100 mr-4 shadow-lg">
            <canvas id="barChart" style="width:100%"></canvas>
            
        </div>
        
        <div class="card px-5 w-75 shadow-lg">
            <canvas id="myChart" style="width:50%"></canvas>
            
        </div>
        </div>
        
    </main>
    
    <footer>
        Copyright &copy; João Cumbo M. Mabiala
    </footer>

     
    <!-- Scripts Bootstrap do jQuery -->
    <script src="js/mychart.js"></script>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>