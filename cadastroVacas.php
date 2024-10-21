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

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $num_ID_Vaca = $_POST["num_ID_Vaca"];
        $data_Nasc_Vaca = $_POST["data_Nasc_Vaca"];
        $raça_Vaca = $_POST["raça_Vaca"];

        // Usar o Singleton para obter a instância única do banco de dados
        $database = Database::getInstance();
        $conn = $database->conn;

        // Criar um objeto Vaca e cadastrar
        $vaca = new Vaca($num_ID_Vaca, $data_Nasc_Vaca, $raça_Vaca);
        if ($vaca->cadastrarVaca($conn)) {
            echo "<script>alert('Vaca cadastrada com Sucesso')</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar vaca')</script>";
        }

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
                <li><a href="cadastroVacas.php">Voltar</a></li>
                <li><a href="login.php">Sair</a></li>
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