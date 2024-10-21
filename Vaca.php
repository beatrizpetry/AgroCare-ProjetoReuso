<?php
class Vaca { // propriedades privadas da classe Vaca
    private $num_ID_Vaca;
    private $data_Nasc_Vaca;
    private $raça_Vaca;
    private $estado_Inseminação;

    // Construtor com parâmetros opcionais
    public function __construct($num_ID_Vaca = null, $data_Nasc_Vaca = null, $raça_Vaca = null) {
        // inicia as propriedades com os valores fornecidos ou com valores padrão (null)
        $this->num_ID_Vaca = $num_ID_Vaca;
        $this->data_Nasc_Vaca = $data_Nasc_Vaca;
        $this->raça_Vaca = $raça_Vaca;
        // inicio padrao do estado de inseminação é "inseminação pendente"
        $this->estado_Inseminação = "Inseminação Pendente";
    }

    public function cadastrarVaca($conn) { // metodo pra cadastrar vaca 
        $sql = "INSERT INTO Vaca (num_ID_Vaca, data_Nasc_Vaca, raça_Vaca, estado_Inseminação)
                VALUES ('$this->num_ID_Vaca', '$this->data_Nasc_Vaca', '$this->raça_Vaca', '$this->estado_Inseminação')"; // query pra inserir os dados da vaca no banco
        if ($conn->query($sql) === TRUE) { // ve se deu tudo certo com a consulta
            return true;
        } else {
            return $conn->error;
        }
    }

    public function deletarVaca($conn) { // metodo pra deletar uma vaca 
        $sql = "DELETE FROM Vaca WHERE num_ID_Vaca = '$this->num_ID_Vaca'"; // query pra deletas os dados da vaca no banco
        if ($conn->query($sql) === TRUE) {
            return true; // retorna true se foi deletado com sucesso
        } else {
            return $conn->error;
        }
    }

    public function buscarVaca($conn) { // metodo pra buscar uma vaca
        $sql = "SELECT * FROM Vaca WHERE num_ID_Vaca LIKE '%$this->num_ID_Vaca%' ORDER BY num_ID_Vaca DESC"; // query SQL pra buscar uma vaca no banco de dados
        return $conn->query($sql);
    }
}
?>