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

    switch ($_POST['op']) {

        case 0:
            echo json_encode(listarPesquisa($conexao));
        
        case 1:
            break;

        case 2:
            echo json_encode(deletePesquisa($_POST['id'], $conexao));
            break;

    }

}



if (isset($_GET["operacao"]) && $_GET["operacao"] == "listagem") {
   echo  json_encode($conexao->listarTudo('pesquisas'));
}