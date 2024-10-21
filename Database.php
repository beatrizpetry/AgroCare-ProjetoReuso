<?php
class Database {
    private static $instance = null;  // Armazenar a única instância
    public $conn;
    private $servername = "localhost";
    private $username = "agrocare";
    private $password = " ";
    private $database = "agrocarefinal";

    // Construtor privado para impedir criação de novos objetos
    private function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Falha na conexão: " . $this->conn->connect_error);
        }
    }

    // Método estático para retornar a instância única
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Método para fechar a conexão, se necessário
    public function closeConnection() {
        $this->conn->close();
    }
}