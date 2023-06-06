<!-- Page Heading -->
<?php 

include "app\config\config.php";
include "app\operacoes\pesquisa.operacoes.php";
$listarPesquisa = listarPesquisa();
include "app".DIRECTORY_SEPARATOR."operacoes".DIRECTORY_SEPARATOR."empresas.operacoes.php";

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        Pesquisa
    </h1>
</div>

<div class="row">
<form class="form-inline" method="POST" action="<?=$config['url']."app/operacoes/pesquisa.operacoes.php"?>">
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputNome" class="sr-only">Nome</label>
    <input required name="nome_pesq" type="text" class="form-control" id="inputNome" placeholder="Nome">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputDataInicio" class="sr-only">Data Início</label>
    <input required name="data_inicio" type="date" class="form-control" id="inputDataInicio" placeholder="Data Início">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputDataFim" class="sr-only">Data Fim</label>
    <input required name="data_fim" type="date" class="form-control" id="inputDataFim" placeholder="Data Fim">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="selectEmpresa" class="sr-only">Empresa</label>
    <select required name='empresa' class="form-control" id="selectEmpresa">

      <option value=""  disabled selected>Selecione uma empresa</option>

      <?php foreach($listarEmpresas as $empresa){?>

      <option value=<?=$empresa['empresa']?>><?=$empresa['fantasia']?></option>

      <?php } ?>

    </select>
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPopulacao" class="sr-only">População</label>
    <input required name="populacao" type="number" class="form-control" id="inputPopulacao" placeholder="População">
  </div>
  <!-- <input type="hidden" id="" name="operacao" value="1"> -->
  <button type="submit" class="btn btn-primary mb-2">Enviar</button>
</form>
</div>

<div class="row">

<table class="table table-striped table-bordered mt-3">
  <thead class="thead-dark">
  <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome da Pesquisa</th>
      <th scope="col">Data de Início</th>
      <th scope="col">Data Final</th>
      <th scope="col">Empresa</th>
      <th scope="col">População</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>

  <?php foreach($listarPesquisa as $chave => $pesquisa) { ?>
    <tr>
      <td><?php echo $pesquisa['id_pesq']?></td>
      <td><?=$pesquisa['nome_pesq']?></td>
      <td><?=date('d/m/Y', strtotime($pesquisa['data_inicio']))?></td>
      <td><?=date('d/m/Y', strtotime($pesquisa['data_fim']))?></td>
      <td><?=$pesquisa['fantasia']?></td>
      <td><?=$pesquisa['populacao']?></td>
      <td>
        
        <a href="" class="btn btn-primary">Editar</a>
        <a onclick="swal( 'Oops' ,  'Something went wrong!' ,  'error' )" class="btn btn-danger">Excluir</a>
      </td>
    </tr>
    <?php } ?>

  </tbody>
</table>
</div>
