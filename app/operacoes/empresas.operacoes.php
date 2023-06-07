<?php

include '../classes/conexao.class.php';

$conn = new Conexao();

if($_SERVER['REQUEST_METHOD'] === 'POST')  {
    // $sql = "insert into perguntas values(null, '".$_POST["titulo_pergunta"]."', null);";
    // $perguntaSalva = $conn->insertQuery($sql);
    // $perguntaId = $conn->runQuery("SELECT max(id) as ultimoId from perguntas")[0]["ultimoId"];

    // foreach ($_POST["resposta_pergunta"] as $resposta) {
    //     $conn->insertQuery("insert into options (id, descricao, pergunta_id, excluido_em) values (null, '".$resposta."', ".$perguntaId.", null);");
    // }     
    
    // echo json_encode(["mensagem" => "Sucesso ao Salvar"]);

    
    exit();
}