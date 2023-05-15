<!-- Page Heading -->
<?php 
include "app\operacoes\pesquisa.operacoes.php";

?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        Pesquisa
    </h1>
</div>

<div class="row">
<form class="form-inline">
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputNome" class="sr-only">Nome</label>
    <input type="text" class="form-control" id="inputNome" placeholder="Nome">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputDataInicio" class="sr-only">Data Início</label>
    <input type="date" class="form-control" id="inputDataInicio" placeholder="Data Início">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputDataFim" class="sr-only">Data Fim</label>
    <input type="date" class="form-control" id="inputDataFim" placeholder="Data Fim">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="selectEmpresa" class="sr-only">Empresa</label>
    <select class="form-control" id="selectEmpresa">
      <option value="">Selecione uma empresa</option>
      <option value="empresa1">Empresa 1</option>
      <option value="empresa2">Empresa 2</option>
      <option value="empresa3">Empresa 3</option>
    </select>
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPopulacao" class="sr-only">População</label>
    <input type="number" class="form-control" id="inputPopulacao" placeholder="População">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Enviar</button>
</form>
</div>

<div class="row">

<table class="table table-striped table-bordered mt-3">
  <thead class="thead-dark">
  <tr>
      <th scope="col">Item</th>
      <th scope="col">Nome</th>
      <th scope="col">Data Início</th>
      <th scope="col">Data Fim</th>
      <th scope="col">Empresa</th>
      <th scope="col">População</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>

  <?php foreach($listarPesquisa as $chave => $pesquisa) { ?>
    <tr>
      <td><?php echo $pesquisa['id_pesq']?></td>
      <td><?php echo $pesquisa['nome_pesq']?></td>
      <td><?php echo date('d/m/Y', strtotime($pesquisa['data_fim']))?></td>
      <td><?php echo date('d/m/Y', strtotime($pesquisa['data_fim']))?></td>
      <td><?php echo $pesquisa['empresa']?></td>
      <td><?php echo $pesquisa['populacao']?></td>
      <td>
        <button type="button" class="btn btn-primary">Editar</button>
        <button type="button" class="btn btn-danger">Excluir</button>
      </td>
    </tr>
    <?php } ?>


  </tbody>
</table>
</div>
