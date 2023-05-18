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

        $result = mysqli_query($conn, "SELECT * FROM ".$tabela);
        
        if (!$result) {
            die('Erro ao consultar');
        }
        
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function runq(string $query) {
        $conn = $this->conexao();
        $result = mysqli_query($conn, $query);

        if (!$result){
            die('Erro ao consultar');
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}

