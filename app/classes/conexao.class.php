<?php

class Conexao {

    private $usuario;

    private $senha;

    private $host;

    private $banco;

    public function __construct($usuario = "root", $senha = "", $host = "localhost", $banco = 'proj_senac') {
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->host = $host;
        $this->banco = $banco;
    }

    public function conexao() {
        $usuario = $this->usuario;
        $senha = $this->senha;
        $host = $this->host;
        $banco = $this->banco;
        $conn = mysqli_connect($host, $usuario, $senha, $banco);

        return $conn;
    }

    public function listarTudo(string $tabela) {
        
        $conn = $this->conexao();

        $result = mysqli_query($conn, "SELECT * FROM ".$tabela." WHERE excluido_em IS NULL");
        
        if (!$result) {
            die('Erro ao consultar');
        }
        
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function runQuery(string $query) {
        $conn = $this->conexao();
        $result = mysqli_query($conn, $query);

        if (!$result){
            die('Erro ao consultar');
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    

    public function insertQuery(string $query) {
        $conn = $this->conexao();
        mysqli_query($conn, $query);
    } 

    public function passValid(string $pass_decode, string $mail_decode) {
        $conn = $this->conexao();
        $result = mysqli_num_rows(mysqli_query(
        $conn, 
        "SELECT * 
        FROM usuarios 
        WHERE pass = md5('$pass_decode') AND email = '$mail_decode'"));
        
        return $result;

    }

    public function findOne( string $tabela, int $id) {
        return $this->runQuery("
            SELECT * 
            FROM $tabela
            WHERE id = $id;
        ");
    }


    public function deleteByID(string $tabela, int $id ) {
        $conn = $this->conexao();
        return mysqli_query($conn, "
            UPDATE $tabela
            SET excluido_em = now()
            WHERE id = $id;
        ");
    }




}

