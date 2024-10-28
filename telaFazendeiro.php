<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/telaFazendeiro.css">
    <title>Tela Fazendeiro</title>
</head>
<?php
require 'database.php';  // Inclui a configuração do Eloquent e a conexão com o banco de dados
require 'Vaca.php';       // Inclui o modelo Vaca

// Obtém todos os registros da tabela Vaca usando Eloquent
$vacas = Vaca::all();
?>
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
                
                <?php foreach ($vacas as $vaca): ?>
                    <tr>
                        <td><?= htmlspecialchars($vaca->num_ID_Vaca) ?></td>
                        <td><?= htmlspecialchars($vaca->data_Nasc_Vaca) ?></td>
                        <td><?= htmlspecialchars($vaca->raça_Vaca) ?></td>
                        <td><?= htmlspecialchars($vaca->estado_Inseminação) ?></td>
                    </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>
    </div>
    <script src="scripts/scriptFazendeiro.js"></script>
</body>
</html>