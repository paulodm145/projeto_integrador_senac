<?php 
//include "app".DIRECTORY_SEPARATOR."operacoes".DIRECTORY_SEPARATOR."empresa.operacoes.php"; 
include "app/classes/conexao.class.php";

$conexao = new conexao();

$listarEmpresa = $conexao->runQuery("SELECT * FROM EMPRESAS WHERE excluido_em IS NULL");
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        Empresas
    </h1>
</div>

<div class="row">

<form class="form-inline" method="POST" action="<?=$config["url"]?>/app/operacoes/empresa.action.php">
  <input type="hidden" value="0" name="empresa_id" id="empresa_id">
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputRazaoSocial" class="sr-only">Razão social</label>
    <input type="text" class="form-control" name="razao" id="razao" placeholder="Razão social" required>
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputNomeFantasia" class="sr-only">Nome fantasia</label>
    <input type="text" class="form-control" name="fantasia" id="fantasia" placeholder="Nome fantasia" required>
  </div>

  <div class="form-group mx-sm-3 mb-2">
    <select class="custom-select" name="status" id="status">
      <option value="A">ATIVO</option>
      <option value="I">INATIVO</option>
      <option value="C">CANCELADO</option>
    </select>
  </div>

  <div class="form-group mx-sm-3 mb-2">
    <label for="inputDoc" class="sr-only">Doc</label>
    <input type="text" class="form-control" name="documento" id="documento" placeholder="Doc" max="14" required>
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <button type="button" id="btn_empresa" onclick="salvarEmpresa()" class="btn btn-success">Salvar</button>
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
      <tr id="empresa_<?php echo $empresa['id']; ?>">
        <td><?php echo $empresa['razao']; ?></td>
        <td><?php echo $empresa['fantasia']; ?></td>
        <td><?php echo $empresa['status']; ?></td>
        <td><?php echo $empresa['documento']; ?> 
        <td>
          <button type="button" class="btn btn-primary" onclick="buscarEmpresa(<?php echo $empresa['id']; ?>)">Editar</button>
          <button type="button" class="btn btn-danger"  onclick="removerEmpresa(<?php echo $empresa['id']; ?>)">Excluir</button>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>

<script>

function salvarEmpresa() {

  dados = {
    "razao"      : $('#razao').val(), 
    "fantasia"   : $('#fantasia').val(), 
    "status"     : $('#status').val(), 
    "documento"  : $('#documento').val(),
    "empresa_id" : $('#empresa_id').val()
  }

  $.ajax({
    url: 'http://localhost/projeto_integrador_senac/app/operacoes/empresas.operacoes.php', 
    data: dados,
    method: "POST", 
    success: function (data) {
      alert('Sucesso ao Salvar');
      // window.location.reload();
    }, 
    error: function(error) {
      console.log(error); 
    }
  })
}

function removerEmpresa(id) {
  $("#empresa_"+id).remove();

  $.ajax({
    url: 'http://localhost/projeto_integrador_senac/app/operacoes/empresas.operacoes.php?id='+id,  
    method: "DELETE", 
    success: function (data) {
      alert('Sucesso AO EXCLUIR !!!');
      console.log(data)
    }, 
    error: function(error) {
      console.log(error); 
    }
  })

}

function buscarEmpresa (id) {
  $.ajax({
    url: 'http://localhost/projeto_integrador_senac/app/operacoes/empresas.operacoes.php?id='+id,  
    method: "GET", 
    success: function (data) {

      let dados = JSON.parse(data)[0];

      $('#btn_empresa').attr('onclick', 'editarEmpresa()')

      $("#empresa_id").val(id);
      
      $('#razao').val(dados.razao); 
      $('#fantasia').val(dados.fantasia);
      $('#status').val(dados.status);
      $('#documento').val(dados.documento);
  
    }, 
    error: function(error) {
      console.log(error); 
    }
  })
}

function editarEmpresa() {

dados = {
  "razao"      : $('#razao').val(), 
  "fantasia"   : $('#fantasia').val(), 
  "status"     : $('#status').val(), 
  "documento"  : $('#documento').val(),
  "empresa_id" : $('#empresa_id').val()
}

$.ajax({
  url: 'http://localhost/projeto_integrador_senac/app/operacoes/empresas.operacoes.php', 
  data: dados,
  method: "POST", 
  success: function (data) {
    console.log('teste', data)
    alert('Registro Atualizado com sucesso !!!')
    window.location.reload();
  }, 
  error: function(error) {
    console.log(error); 
  }
})
}

</script> 