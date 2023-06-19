<?php

include '../classes/conexao.class.php';

$conn = new Conexao();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST["empresa_id"])  {

    $razao = $_POST['razao'];
    $fantasia = $_POST['fantasia'];
    $status = $_POST['status'];
    $documento = $_POST['documento'];
    $empresa_id = $_POST['empresa_id'];

    $sql ="UPDATE empresas SET  
        razao='{$razao}', fantasia='{$fantasia}', status='{$status}', documento='{$documento}'
        WHERE id = {$empresa_id};";

    $empresasalva = $conn->editQuery($sql);
    echo json_encode(
        [
            "message" => "EDITADO COM SUCESSO !!",
            "status" =>  $empresasalva
        ]);
    exit();

}

if ($_SERVER['REQUEST_METHOD'] === 'POST')  {

    $razao = $_POST['razao'];
    $fantasia = $_POST['fantasia'];
    $status = $_POST['status'];
    $documento = $_POST['documento'];

    $sql ="INSERT INTO EMPRESAS VALUES (null, '{$razao}', '{$fantasia}', '{$status}', '{$documento}', null);";
    $empresasalva = $conn->insertQuery($sql);
    echo json_encode(
        [
            "message" => "SALVO COM SUCESSO !!",
            "status" =>  $empresasalva
        ]);
    exit();
}

if  ($_SERVER['REQUEST_METHOD'] === 'DELETE')  {

    $conn->deleteByID('empresas', $_GET['id']);

    echo json_encode(
        [
            "message" => "SALVO COM SUCESSO !!",
            "status" =>  $_GET['id']
        ]);

    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']))  {
    $dados = $conn->deleteByID('perguntas', $_GET['id']);
    echo json_encode($dados);
    exit();
}

    
    