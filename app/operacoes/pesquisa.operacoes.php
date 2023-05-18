<?php


$query = "SELECT p.id_pesq, p.nome_pesq, p.data_inicio, p.data_fim, e.fantasia, p.populacao 
          FROM pesquisas as p  
          LEFT JOIN empresas as e 
          ON p.empresa = e.id_emp";
        
$listarPesquisa = $conexao->runq($query);


function inputPesquisa() {
    $comaSpace = ', ';
    $quote = "'";
    $values = $quote.$_POST['nome_pesq'].$quote.$comaSpace.$quote.$_POST['data_inicio'].$quote.$comaSpace.$quote.$_POST['data_fim'].$quote.$comaSpace.$_POST['empresa'].$comaSpace.$_POST['populacao'];
    
    $query = "INSERT INTO pesquisas
              VALUES (null, ".$values.")";
    echo $query;
}

if (isset($_POST['nome_pesq'])){
    inputPesquisa();
}