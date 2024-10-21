<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/estiloGeral.css">
    <title>Cadastro Vacas</title>
</head>
<body>
<?php
    session_start();
    include_once 'Database.php';
    include_once 'Vaca.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") { // Inicia o request de POST
        $num_ID_Vaca = $_POST["num_ID_Vaca"]; // POST do ID da Vaca
        $data_Nasc_Vaca = $_POST["data_Nasc_Vaca"]; // POST da Data de Nascimento da Vaca
        $raça_Vaca = $_POST["raça_Vaca"]; // POST da Raça da vaca

        // Usar o Singleton para obter a instância única do banco de dados
        $database = Database::getInstance();
        $conn = $database->conn;

        // Verificar se já existe uma vaca com o mesmo ID no banco de dados
        $sql_check = "SELECT * FROM Vaca WHERE num_ID_Vaca = ?";
        $stmt = $conn->prepare($sql_check); // prepara a consulta SQL usando a conexão com o banco de dados 
        $stmt->bind_param("s", $num_ID_Vaca); // associa o valor do parâmetro a consulta, o "s" indica que o tipo de dado do parâmetro é uma string.
        $stmt->execute(); // executa a consulta
        $result = $stmt->get_result(); // pega o resultado da consulta

        if ($result->num_rows > 0) {
            // Se já existir, exibe uma mensagem de alerta
            echo "<script>alert('Erro: Já existe uma vaca cadastrada com esse ID.')</script>";
        } else {
            // Se não existir, cria a vaca no banco
            $vaca = new Vaca($num_ID_Vaca, $data_Nasc_Vaca, $raça_Vaca);
            if ($vaca->cadastrarVaca($conn)) {
                echo "<script>alert('Vaca cadastrada com Sucesso')</script>";
            } else {
                echo "<script>alert('Erro ao cadastrar vaca')</script>";
            }
        }

        // Fechar conexão com o banco (opcional, pois o Singleton pode manter a conexão aberta)
        $database->closeConnection();
    }
?>
    <div class="header">
        <h1>Funcionário</h1>
        <img src="img/vaca.png" class="imagem-vaca" width="110px">
        <button class="menu-button" id="menuButton"></button>
        <div class="menu-box" id="menuBox">
            <ul>
                <li><a href="deletarVacas.php">Deletar Vacas</a></li>
                <li><a href="telaFazendeiro.php">Acompanhamento</a></li>
                <li><a href="inseminarVacas.php">Inseminar Vacas</a></li>
            </ul>
        </div>
    </div>
    <div class="main">
        <form action="cadastroVacas.php" method="POST">
            <div class="inputs">
                <h2>Cadastro de Vacas</h2>
                <div class="box1">
                    <label>N° Identificador:</label>
                    <input type="text" name="num_ID_Vaca" size="21" placeholder="Digite o N° Identificador" pattern="[0-9]{3}" required>
                </div>
                <div class="box1">
                    <label>Data de Nascimento:</label>
                    <input class="date" type="date" name="data_Nasc_Vaca" size="21" placeholder="Digite a data de nascimento" maxlength="20" required>
                </div>
                <h6>*Informe uma Data aproximada, apenas para o cálculo da idade do animal.</h6>
                <div class="box1">
                    <label>Raça:</label>
                    <input type="text" name="raça_Vaca" size="21" placeholder="Digite a raça da Vaca" maxlength="20" required>
                </div>
            </div>
            <div class="btns">
                <button type="button" id="btn-cancelar" class="btn-cancelar">Cancelar</button>
                <button class="btn-cadastrar" type="submit" name="cadastrar">Cadastrar</button>
            </div>
        </form>
    </div>
    <script src="scripts/scriptCadVacas.js"></script>
</body>
</html>
