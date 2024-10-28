<?php
require 'database.php';
use Illuminate\Database\Capsule\Manager as Capsule;

try {
    Capsule::connection()->getPdo();
    echo "Conexão com o banco de dados bem-sucedida!";
} catch (\Exception $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
