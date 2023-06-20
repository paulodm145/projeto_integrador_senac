<?php
session_start();

include('../classes/conexao.class.php');

$conexao = new Conexao();
$conn = $conexao->conexao();

$id = $_SESSION['user_id'];
date_default_timezone_set('America/Sao_Paulo');
$date_decode = date("Y-m-d");
$time_decode = date("H:i:s");
mysqli_query($conn, "INSERT INTO `acess_logs`(`usuario`, `acess_date`, `acess_time`, `way`) VALUES ('$id','$date_decode','$time_decode', 'OUT')");
session_destroy();
header('Location: http://localhost/projeto_integrador_senac/index.php');
exit();