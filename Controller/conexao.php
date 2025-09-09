<?php
    $host = "mysql";
    $user = "root";
    $password = "";
    $dbname = "gestao_stock";

    // Criando a conexão
    $conn = mysqli_connect($host, $user, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error); 
}

?>
