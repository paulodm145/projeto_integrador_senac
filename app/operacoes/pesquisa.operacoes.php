<?php



function  listarPesquisa(Conexao $conexao){
    $query = "SELECT p.id, p.nome_pesq, p.data_inicio, p.data_fim, e.fantasia, p.populacao 
            FROM pesquisas as p  
            LEFT JOIN empresas as e 
            ON p.empresa = e.id
            WHERE p.excluido_em IS NULL;";
            
    return $conexao->runQuery($query);

}

function inputPesquisa(Conexao $conexao) {
    $query = "SELECT *
              FROM pesquisas
              WHERE nome_pesq = '".$_POST['nome_pesq']."' AND empresa = ".$_POST['empresa']." AND data_inicio = '".$_POST['data_inicio']."'";

    $result = count($conexao->runQuery($query));
    
    $comaSpace = ', ';
    $quote = "'";
    $values = $quote.$_POST['nome_pesq'].$quote.$comaSpace.$quote.$_POST['data_inicio'].$quote.$comaSpace.$quote.$_POST['data_fim'].$quote.$comaSpace.$_POST['empresa'].$comaSpace.$_POST['populacao'].$comaSpace.'NULL';
    
    $query = "INSERT INTO pesquisas
              VALUES (null, ".$values.");";
    
    if ($result <= 0){
        echo $query;
        $conexao->insertQuery($query);
    }

}



function deletePesquisa(int $id, Conexao $conexao) {
    if ($conexao->deleteByID("pesquisas", $id)){
        return [
            "mensagem" => "Sucesso no delete!",
            "excluido" => $conexao->findOne("pesquisas", $id)
        ];
    }

    return [
        "mensagem" => "Erro no delete!",
        "nao_excluido" => $conexao->findOne("pesquisas", $id)
    ];
}


function listaEmpresas(Conexao $conexao, int $id){
    $query = "SELECT DISTINCT eu.empresa, e.fantasia
          FROM emp_user as eu  
          LEFT JOIN empresas as e 
          ON eu.empresa = e.id
          WHERE eu.usuario = ".$id;

    return $conexao->runQuery($query);

}

