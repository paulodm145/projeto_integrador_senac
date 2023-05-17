<?php

include "./app/classes/conexao.class.php";


$conexao = new Conexao('root', '', 'localhost', 'cadastro');

$tabela = "empresas";
$listarEmpresa = $conexao->listarTudo($tabela);