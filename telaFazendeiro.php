<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/telaFazendeiro.css">
    <title>Tela Fazendeiro</title>
</head>
<body>
    <div class="header">
        <h1>Fazendeiro</h1>
        <img src="img/vaca.png" class="imagem-vaca" width="110px">
        <button class="menu-button" id="menuButton"></button>
        <div class="menu-box" id="menuBox">
            <ul>
            <li><a href="deletarVacas.php">Deletar Vacas</a></li>
                <li><a href="cadastroVacas.php">Cadastrar Vacas</a></li>
                <li><a href="inseminarVacas.php">Inseminar Vacas</a></li>
            </ul>
        </div>
    </div>
    <div class="main">
        <h2>Acompanhamento</h2>
        <table class="container">
            <thead>
                <tr>
                    <th>N° Identificador</th>
                    <th>Nascimento</th>
                    <th>Raça</th>
                    <th>Inseminação</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                    // Incluindo o Singleton para conexão com o banco de dados
                    include_once 'Database.php';
                    
                    // Usar o Singleton para obter a instância única do banco de dados
                    $database = Database::getInstance();
                    $conn = $database->conn;

                    // Consulta ao banco de dados
                    $sql = "SELECT * FROM Vaca";
                    $result = $conn->query($sql);
    
                    // Verificação de erros na consulta
                    if (!$result) {
                        die("Erro na consulta: " . $conn->error);
                    }
    
                    // Exibição dos valores na tabela
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["num_ID_Vaca"] . "</td>";
                        echo "<td>" . $row["data_Nasc_Vaca"] . "</td>";
                        echo "<td>" . $row["raça_Vaca"] . "</td>";
                        echo "<td>" . $row["estado_Inseminação"] . "</td>";
                        echo "</tr>";
                    }
                    
                    $database->closeConnection();
                ?>
                
            </tbody>
        </table>
    </div>
    <script src="scripts/scriptFazendeiro.js"></script>
</body>
</html>