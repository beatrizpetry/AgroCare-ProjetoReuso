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
require 'database.php';
require 'Vaca.php';

if (!empty($_GET['search'])) {
    $num_ID_Vaca = $_GET['search'];
    $vacas = Vaca::buscarVaca($num_ID_Vaca);

    if ($vacas->isNotEmpty()) {
        foreach ($vacas as $vaca) {
            $vaca->estado_Inseminação = 'Inseminação Realizada';
            $vaca->save();
            echo "<script>alert('Número Identificador: " . $vaca->num_ID_Vaca . " - Inseminação Confirmada')</script>";
        }
    } else {
        echo "<script>alert('Vaca não encontrada no sistema, confira o Identificador informado.')</script>";
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
            <form method="GET" action="inseminarVacas.php">
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
