<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/estiloGeral.css">
    <title>Inseminação</title>
</head>
<body>

    <?php
        // Inicia a sessão para armazenar e acessar dados globais entre páginas
        session_start();

        // Inclui o arquivo Database.php para obter a conexão com o banco de dados através da classe Singleton
        include_once('Database.php'); 
        
        // Verifica se o parâmetro 'search' não está vazio, ou seja, se foi enviado algum valor de busca
        if (!empty($_GET['search'])) {
            $data = $_GET['search']; // Armazena o valor da busca na variável $data

            // Obter a instância da conexão ao banco de dados via Singleton para reutilização da mesma conexão
            $database = Database::getInstance();
            $conn = $database->conn;

            // Consulta SQL que busca uma vaca no banco de dados com base no identificador fornecido
            // Utiliza LIKE para buscar valores semelhantes ao que foi passado na busca
            $sql = "SELECT * FROM Vaca WHERE num_ID_Vaca LIKE '%$data' ORDER BY num_ID_Vaca DESC";
            $result = $conn->query($sql);

            // Verifica se a consulta retornou resultados
            if ($result->num_rows > 0) {
                // Itera sobre os resultados encontrados
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='dados-vaca'>";
                    // Exibe um alerta no navegador informando o número identificador da vaca e que a inseminação foi confirmada
                    echo "<script>alert('Número Identificador: " . $row['num_ID_Vaca'] . " - Inseminação Confirmada')</script>";
                    echo "</div>";
                }
            } else {
                // Se não houver resultados, exibe uma mensagem de alerta informando que a vaca não foi encontrada
                echo "<script>alert('Vaca não encontrada no sistema, confira o Identificador informado.')</script>";
            }
        } 
        
        // Repete a verificação se o parâmetro 'search' não está vazio (duplicação de código)
        if (!empty($_GET['search'])) {
            $data = $_GET['search']; // Armazena novamente o valor da busca na variável $data

            // Obter a instância da conexão ao banco de dados via Singleton para garantir o reuso da conexão
            $database = Database::getInstance();
            $conn = $database->conn;
        
            // Consulta SQL para buscar vaca correspondente ao número de identificação
            $sql = "SELECT * FROM Vaca WHERE num_ID_Vaca LIKE '%$data' ORDER BY num_ID_Vaca DESC";
            $result = $conn->query($sql);
        
            // Verifica se há resultados na consulta
            if ($result->num_rows > 0) {
                // Itera pelos resultados da consulta
                while ($row = $result->fetch_assoc()) {
                    $id_vaca = $row['num_ID_Vaca']; // Armazena o ID da vaca para uso na atualização
                    
                    // Atualiza o estado da inseminação no banco de dados
                    $string = "Inseminação Realizada";
                    $sql_update = "UPDATE Vaca SET estado_Inseminação = '$string' WHERE num_ID_Vaca = '$id_vaca'";
                    $conn->query($sql_update); // Executa a consulta de atualização no banco
                }
            } 
        }
    ?>


    <div class="header">
        <h1>Veterinário</h1>
        <img src="img/vaca.png" class="imagem-vaca" width="110px">
        <button class="menu-button" id="menuButton"></button>
            <div class="menu-box" id="menuBox">
                <ul>
                <li><a href="deletarVacas.php">Deletar Vacas</a></li>
                <li><a href="telaFazendeiro.php">Acompanhamento</a></li>
                <li><a href="cadastroVacas.php">Inseminar Vacas</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="inputs">
            <h2>Inseminação de Vacas</h2>
            <form method="GET" action="areaVet.php">
                <div class="box1">
                    <label>N° Identificador:</label>
                    <input type="search" class="form-control w-25" id="pesquisar" name="search" size="30" placeholder="ID da Vaca que será Inseminada" pattern="[0-9]{3}" maxlength="10" required><br>
                    <button id="btn-buscar" class="btn-buscar">Realizar Inseminação</button>
                </div>
            </form>
            <form>
                <div class="box1">
                    <h6>*Ao informar a Identificação do Animal e Realizar a busca, você estará confirmando a realização da Inseminação</h6>
                </div>
            </form>
        </div>
        <script src="scripts/scriptCadVacas.js"></script>
</body>
</html>
