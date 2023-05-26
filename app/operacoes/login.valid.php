<?php
if(!$pass_decode) {
    header('Location: login.php');
    exit();
}
include ('../classes/conexao.class.php');

$conexao = new Conexao();
$conn = $conexao->conexao();
$pass_valid = $conexao->passValid($pass_decode, $mail_decode);