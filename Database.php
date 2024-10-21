<?php
class Database {
    // Armazena a única instância da classe (padrão Singleton)
    private static $instance = null;  // Armazenar a única instância
    public $conn; // Conexão com o banco de dados que será reutilizada por toda a aplicação

    // Detalhes da conexão com o banco de dados, encapsulados para permitir reuso com diferentes parâmetros se necessário
    private $servername = "localhost";
    private $username = "agrocare";
    private $password = " ";
    private $database = "agrocarefinal";

    // O construtor é privado para impedir a criação de novos objetos desta classe
    // Isso garante que apenas uma instância será criada (padrão Singleton)
    private function __construct() {
        // Cria a conexão com o banco de dados, evitando a necessidade de repetição da lógica de conexão em várias partes do código
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        // Verifica se houve erro ao tentar se conectar ao banco de dados
        if ($this->conn->connect_error) {
            // Se a conexão falhar, o script é interrompido e exibe a mensagem de erro
            die("Falha na conexão: " . $this->conn->connect_error);
        }
    }

    // Método estático que garante que sempre será retornada a mesma instância da classe
    // Isso promove o reuso da conexão ao invés de criar múltiplas conexões ao banco, economizando recursos
    public static function getInstance() {
        // Verifica se a instância ainda não foi criada, se não, cria uma nova instância da classe Database
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance; // Retorna a instância única da classe
    }

    // Método para fechar a conexão com o banco de dados, caso seja necessário
    public function closeConnection() {
        // Centraliza o fechamento da conexão, facilitando o reuso deste processo sem duplicação de código
        $this->conn->close();
    }
}