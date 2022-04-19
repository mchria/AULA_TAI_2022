<?php

class BD {

    private $host ="localhost";
    private $dbname ="db_aula_tai";
    private $port = 3306;
    private $usuario = "root";
    private $senha = "";
    private $db_charset = "utf8";

    public function conn(){
        $conn = "mysql:host=$this->host;
            dbname=$this->dbname;port=$this->port";

        return new PDO($conn,$this->usuario,$this->senha,
        [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ". $this->db_charset]
    );
    }
     public function insert($dados){

         $conn = $this->conn();
         $sql = "INSERT INTO usuario (nome, telfone, cpf) value (?, ?, ?)";

     
         $st = $conn->prepare($sql);
         $arrayDados = [];
         $arrayDados[] =$dados['nome'];
         $arrayDados[] =$dados['telefone'];
         $arrayDados[] =$dados['cpf'];
         $st->execute($arrayDados);

         $st->execute($arrayDados);

        return $st;
     }

}
?>