<!-- Page Heading -->
<?php 

// include "app".DIRECTORY_SEPARATOR."operacoes".DIRECTORY_SEPARATOR."empresas.operacoes.php";

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        Pesquisa
    </h1>
</div>

<div class="row">
<form class="form-inline" method="POST" action="http://localhost/projeto_integrador_senac/app/operacoes/pesquisa-op.php">
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

    </select>
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPopulacao" class="sr-only">População</label>
    <input required name="populacao" type="number" class="form-control" id="inputPopulacao" placeholder="População">
  </div>
  <input type="hidden" id="op1" name="op" value="1">
  <button type="submit" class="btn btn-primary mb-2">Enviar</button>
</form>
</div>

<div class="container-fluid">

<table class="table">
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
  <tbody id="tabela-pesquisa"> 
  </tbody>
</table>
</div>
