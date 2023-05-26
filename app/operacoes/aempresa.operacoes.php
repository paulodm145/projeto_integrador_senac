<?php

include "./app/classes/conexao.class.php";

include "./app/config/config.php";


$conexao = new Conexao();

$tabela = "empresas";
$listarEmpresa = $conexao->listarTudo($tabela);