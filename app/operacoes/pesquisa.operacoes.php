<?php
$redir = 1;

if (!isset($conexao)){
    include ('../config/config.php');
    // MECHER AQUI
}


function  listarPesquisa(){
    $conexao = new Conexao();
    $query = "SELECT p.id_pesq, p.nome_pesq, p.data_inicio, p.data_fim, e.fantasia, p.populacao 
            FROM pesquisas as p  
            LEFT JOIN empresas as e 
            ON p.empresa = e.id_emp";
            
    return $conexao->runQuery($query);

}

function inputPesquisa() {
    $conexao = new Conexao();
    $query = "SELECT *
              FROM pesquisas
              WHERE nome_pesq = '".$_POST['nome_pesq']."' AND empresa = ".$_POST['empresa']." AND data_inicio = '".$_POST['data_inicio']."'";

    $result = count($conexao->runQuery($query));
    
    $comaSpace = ', ';
    $quote = "'";
    $values = $quote.$_POST['nome_pesq'].$quote.$comaSpace.$quote.$_POST['data_inicio'].$quote.$comaSpace.$quote.$_POST['data_fim'].$quote.$comaSpace.$_POST['empresa'].$comaSpace.$_POST['populacao'];
    
    $query = "INSERT INTO pesquisas
              VALUES (null, ".$values.")";
    
    if ($result <= 0){
        $conexao->insertQuery($query);
    }
}

if (isset($_POST['nome_pesq'])){
    inputPesquisa();
    header($config["url"]."index.php?page=pesquisa");
}