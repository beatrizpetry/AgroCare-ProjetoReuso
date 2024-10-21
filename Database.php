<?php
class Database {
    private $servername = "localhost";
    private $username = "agrocare";
    private $password = " ";
    private $database = "agrocarefinal";
    public $conn;

    public function __construct() {
        // Crie a conexão com o banco de dados
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        // Verifique se ocorreu um erro na conexão
        if ($this->conn->connect_error) {
            die("Falha na conexão: " . $this->conn->connect_error);
        }
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
?>