<?php

include '../classes/conexao.class.php';

$conn = new Conexao();

if($_SERVER['REQUEST_METHOD'] === 'POST')  {

    
    if($_POST["pergunta_id"] == 0) {

        $sql = "insert into perguntas values(null, '".$_POST["titulo_pergunta"]."', null);";
        $perguntaSalva = $conn->insertQuery($sql);
        $perguntaId = $conn->runQuery("SELECT max(id) as ultimoId from perguntas")[0]["ultimoId"];

        foreach ($_POST["resposta_pergunta"] as $resposta) {
            $conn->insertQuery("insert into options (id, descricao, pergunta_id, excluido_em) values (null, '".$resposta."', ".$perguntaId.", null);");
        }     
        
        echo json_encode(["mensagem" => "Sucesso ao Salvar"]);
        exit();

    }

    if ($_POST["pergunta_id"] != 0) {

        foreach ($_POST["resposta_pergunta"] as $resposta) {
            $conn->insertQuery("insert into options (id, descricao, pergunta_id, excluido_em) values (null, '".$resposta."', ".$_POST["pergunta_id"].", null);");
        }     
        
        echo json_encode(["mensagem" => "Sucesso ao Salvar"]);
        exit();

    } 

}

if($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['pesquisar'] === "true")  {
    $sql = "SELECT * FROM options WHERE pergunta_id =".$_GET["id"];
    echo json_encode($conn->runQuery($sql));
    exit;
}

