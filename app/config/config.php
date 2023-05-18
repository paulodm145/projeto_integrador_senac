<?php


$config = [
    "url" => "http://localhost/projeto_integrador_senac/"
];

if(isset($redir)){
    $path = "..\classes\conexao.class.php";
    include $path;
    $conexao = new Conexao();
    header("Location: ".$config['url']."index.php?page=pesquisa");
}


$path = ".\app\classes\conexao.class.php";
include $path;
$conexao = new Conexao();