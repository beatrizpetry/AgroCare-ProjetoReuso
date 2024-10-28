<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/estiloGeral.css">
    <title>Deletar Vacas</title>
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
            $vaca->deletarVaca();
            echo "<script>alert('Vaca com número identificador: " . $vaca->num_ID_Vaca . " foi removida com sucesso.')</script>";
        }
    } else {
        echo "<script>alert('Vaca não encontrada no sistema. Confira o identificador informado.')</script>";
    }
}
?>

<div class="header">
    <h1>Funcionário</h1>
    <img src="img/vaca.png" class="imagem-vaca" width="110px">
    <button class="menu-button" id="menuButton"></button>
    <div class="menu-box" id="menuBox">
        <ul>
            <li><a href="cadastroVacas.php">Cadastrar Vacas</a></li>
            <li><a href="telaFazendeiro.php">Acompanhamento</a></li>
            <li><a href="inseminarVacas.php">Inseminar Vacas</a></li>
        </ul>
    </div>
</div>

<div class="main">
    <div class="inputs">
        <h2>Remover Vacas</h2>
        <form method="GET" action="deletarVacas.php">
            <div class="box1">
                <label>N° Identificador:</label>
                <input type="search" class="form-control w-25" id="pesquisar" name="search" size="30" placeholder="ID da Vaca que será Deletada" pattern="[0-9]{3}" maxlength="10" required><br>
                <button id="btn-buscar" class="btn-buscar" type="submit">Remover</button>
            </div>
        </form>
        <h6>*Ao informar a Identificação do Animal e realizar a busca, você estará confirmando sua remoção no sistema</h6>
    </div>
</div>

<script src="scripts/scriptCadVacas.js"></script>
</body>
</html>
