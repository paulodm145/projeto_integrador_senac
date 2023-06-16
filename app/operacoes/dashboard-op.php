<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

header('Content-Type: application/json');

include("../config/config.php");
include("../operacoes/pesquisa.operacoes.php");

if (isset($_POST['op'])){

    $id = 1;
    switch ($_POST['op']) {

        case 0:
            $query = "SELECT nome_pesq FROM pesquisas WHERE id = $id";
            $arr = $conexao->runQuery($query)[0]['nome_pesq'];
            echo json_encode($arr);
            break;

        case 1:
            $query = "SELECT DISTINCT(per.desc_perg) FROM itens_pesq as i JOIN perguntas as per ON i.id_perg = per.id WHERE i.id_pesq = $id";
            $arr = $conexao->runQuery($query);
            echo json_encode($arr);
            break;

        case 2:
            $query = "SELECT data_inicio, data_fim, populacao FROM pesquisas WHERE id = $id;";
            $arr1 = $conexao->runQuery($query);
            $query = "SELECT COUNT(r.id) as aceite FROM respostas as r LEFT JOIN itens_pesq as i ON r.item_id = i.id WHERE i.id_pesq = $id GROUP BY i.id_perg LIMIT 0,1;";
            $arr2 = $conexao->runQuery($query);
            echo json_encode(array(
                "card1" => $arr1[0],
                "card2" => $arr2[0]
            ));
            break;


    //MECHER AQUI
    }

}