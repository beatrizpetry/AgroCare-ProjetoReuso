<?php
require 'database.php';
require 'Vaca.php';

// Dados para a inserção
$data = [
    'num_ID_Vaca' => '696',
    'data_Nasc_Vaca' => '2020-01-01',
    'raça_Vaca' => 'Holandesa',
    'estado_Inseminação' => 'Inseminação Pendente'
];

// Inserindo no banco de dados
$vaca = Vaca::cadastrarVaca($data);

if ($vaca) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar vaca.";
}
?>
