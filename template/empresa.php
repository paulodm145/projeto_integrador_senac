<?php 
include "app".DIRECTORY_SEPARATOR."operacoes".DIRECTORY_SEPARATOR."empresa.operacoes.php";
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        Empresas
    </h1>
</div>

<div class="row">
  
<form class="form-inline" action="app\operacoes\pesquisa.operacoes.php">
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputRazaoSocial" class="sr-only">Razão social</label>
    <input type="text" class="form-control" id="inputRazaoSocial" placeholder="Razão social">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputNomeFantasia" class="sr-only">Nome fantasia</label>
    <input type="text" class="form-control" id="inputNomeFantasia" placeholder="Nome fantasia">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputStatus" class="sr-only">Status</label>
    <input type="text" class="form-control" id="inputStatus" placeholder="Status">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputDoc" class="sr-only">Doc</label>
    <input type="text" class="form-control" id="inputDoc" placeholder="Doc">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <button type="button" class="btn btn-success">Salvar</button>
  </div>
</form>

</div>

<div class="container-fluid">
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Razão social</th>
        <th>Nome fantasia</th>
        <th>Status</th>
        <th>Doc</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($listarEmpresa as $chave => $empresa) { ?> 
      <tr>
        <td><?php echo $empresa['razao']; ?></td>
        <td><?php echo $empresa['fantasia']; ?></td>
        <td><?php echo $empresa['status_emp']; ?></td>
        <td><?php echo $empresa['doc']; ?> 
        <td>
          <button type="button" class="btn btn-primary">Editar</button>
          <button type="button" class="btn btn-danger">Excluir</button>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>