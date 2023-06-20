<?php
session_start();

$sess_hash = $_POST['sess_hash'];

$len = strlen($sess_hash) - 1281;

$sess_hash = substr($sess_hash, 640, $len);

$sess_hash = explode('/', $sess_hash);

$mail_hash = str_split($sess_hash[0]);
$pass_hash = str_split($sess_hash[1]);
$date_hash = str_split($sess_hash[2]);

$mail_decode = '';
$pass_decode = '';

for ($i=0; $i < count($mail_hash); $i++) { 
    if($i % 2 == 0){
        $mail_decode .= $mail_hash[$i];
    }
}

for ($i=0; $i < count($pass_hash); $i++) { 
    if($i % 2 == 0){
        $pass_decode .= $pass_hash[$i];
    }
}

$mail_decode = strrev($mail_decode);
$pass_decode = strrev($pass_decode);

date_default_timezone_set('America/Sao_Paulo');

include('login.valid.php');

if($pass_valid == 1){
    $_SESSION['login'] = $mail_decode;
    $_SESSION['pass'] = $pass_decode;
    //$sql = "SELECT user_id FROM usuarios WHERE email = '$mail_decode'";
    $sql = "SELECT id, name, email FROM usuarios WHERE email = '$mail_decode'";
    $result = mysqli_query($conn, $sql);
    $dados = mysqli_fetch_array($result);
    $_SESSION['dados_usuario'] = $dados; 
    $_SESSION['id'] = $dados[0];
    mysqli_query($conn, "INSERT INTO `acess_logs`(`usuario`, `acess_date`, `acess_time`, `way`) VALUES ($dados[0],now(), now(), 'IN')");
    header('Location: http://localhost/projeto_integrador_senac/index.php');
}else{
    $_SESSION['nao_autenticado'] = true;
    header('Location: http://localhost/projeto_integrador_senac/template/login.php');
}