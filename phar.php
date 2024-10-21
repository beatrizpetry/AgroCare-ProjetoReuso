<?php
// Caminho e nome do arquivo PHAR que você deseja criar
$pharFile = 'AgroCare.phar';

try {
    // Inicialize o PHAR
    $phar = new Phar($pharFile);

    // Configura o diretório que será empacotado dentro do PHAR
    $phar->buildFromDirectory(__DIR__);

    // Define o ponto de entrada (stub) do PHAR
    $phar->setStub($phar->createDefaultStub('cadastroVacas.php'));

    echo "Arquivo PHAR '$pharFile' criado com sucesso!\n";
} catch (Exception $e) {
    echo "Erro ao criar o arquivo PHAR: ", $e->getMessage(), "\n";
}
?>