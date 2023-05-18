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

<form class="form-inline" method="POST" action="<?=$config["url"]?>/app/operacoes/empresa.action.php">
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputRazaoSocial" class="sr-only">Razão social</label>
    <input type="text" class="form-control" name="razao" id="razao" placeholder="Razão social" required>
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputNomeFantasia" class="sr-only">Nome fantasia</label>
    <input type="text" class="form-control" name="fantasia" id="fantasia" placeholder="Nome fantasia" required>
  </div>

  <div class="form-group mx-sm-3 mb-2">
    <select class="custom-select" name="status_emp" id="status_emp">
      <option value="ATIVO">ATIVO</option>
      <option value="INATIVO">INATIVO</option>
      <option value="CANCELADO">CANCELADO</option>
    </select>
  </div>

  <div class="form-group mx-sm-3 mb-2">
    <label for="inputDoc" class="sr-only">Doc</label>
    <input type="text" class="form-control" name="doc" id="inputDoc" placeholder="Doc" max="14" required>
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <button type="submit" class="btn btn-success">Salvar</button>
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