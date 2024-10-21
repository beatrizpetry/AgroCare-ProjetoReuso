<?php
class Vaca {
    private $num_ID_Vaca;
    private $data_Nasc_Vaca;
    private $raça_Vaca;
    private $estado_Inseminação;

    // Construtor com parâmetros opcionais
    public function __construct($num_ID_Vaca = null, $data_Nasc_Vaca = null, $raça_Vaca = null) {
        $this->num_ID_Vaca = $num_ID_Vaca;
        $this->data_Nasc_Vaca = $data_Nasc_Vaca;
        $this->raça_Vaca = $raça_Vaca;
        $this->estado_Inseminação = "Inseminação Pendente";
    }

    public function cadastrarVaca($conn) {
        $sql = "INSERT INTO Vaca (num_ID_Vaca, data_Nasc_Vaca, raça_Vaca, estado_Inseminação) 
                VALUES ('$this->num_ID_Vaca', '$this->data_Nasc_Vaca', '$this->raça_Vaca', '$this->estado_Inseminação')";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return $conn->error;
        }
    }

    public function deletarVaca($conn) {
        $sql = "DELETE FROM Vaca WHERE num_ID_Vaca = '$this->num_ID_Vaca'";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return $conn->error;
        }
    }

    public function buscarVaca($conn) {
        $sql = "SELECT * FROM Vaca WHERE num_ID_Vaca LIKE '%$this->num_ID_Vaca%' ORDER BY num_ID_Vaca DESC";
        return $conn->query($sql);
    }
}
?>