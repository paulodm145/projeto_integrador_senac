<?php

include "./app/classes/conexao.class.php";


$conexao = new Conexao();

$tabela = "pesquisas";
$listarPesquisa = $conexao->listarTudo($tabela);









