<?php 
  include "app/classes/conexao.class.php";
  $conexao = new conexao();

  $lista_perguntas_contagem = $conexao->runQuery("SELECT perguntas.*, COUNT(options.id) AS total_options FROM perguntas LEFT JOIN options ON perguntas.id = options.pergunta_id GROUP BY perguntas.id");

  $lista_perguntas = $conexao->runQuery("SELECT id, descricao FROM perguntas");


?>



<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Formulário</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Perguntas</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><h2>Faça sua pergunta.</h2>
<form id="meuFormulario" class="mt-5">
<!-- ---------------------------------------------------------------- -->
<div class="input-group mb-3">
  <input type="text" class="form-control" name="" id="titulo_pergunta" placeholder="Escreva a pergunta" aria-label="Escreva o conteúdo da pergunta:" aria-describedby="button-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" id="button-addon2" onClick="limparTituloPergunta()">Limpar Tudo</button>
  </div>
</div>
<!-- ---------------------------------------------------------------- -->

<!-- ---------------------------------------------------------------- -->
<div class="input-group mb-3 w-100">
<label for="status">Ou selecione uma pergunta já existente:</label>
   <br><select name="pergunta_id" id="pergunta_id" class="dropdown-item"  >
      
    <option value="0">Selecione uma opção</option>
    <?php foreach($lista_perguntas as $pergunta) { 
        echo '<option value="'.$pergunta["id"].'">'.$pergunta["descricao"]."</option>";
      }
    ?>

    </select></br>
</div>
<!-- ---------------------------------------------------------------- -->

<div class="alert alert-info">Informe as Respostas possíveis</div>

<div id="lista_respostas">
  <div class="input-group mb-3">
    <input type="text" class="form-control" name="resposta_pergunta[]" id="resposta_pergunta" placeholder="Opção de resposta" aria-label="Escreva o conteúdo da pergunta:" aria-describedby="button-addon2">
    <div class="input-group-append">
      <button class="btn btn-success" type="button" id="btn-add-pergunta" onClick="duplicarPergunta()">+</button>
    </div>
  </div>
</div>

<br>

<div class="form-group">
  <p><button type="button" class="btn btn-primary" id="registrar_pergunta">Registrar Pergunta</button>
  <button type="button" class="btn btn-danger" onclick="cancelarFormulario()">Cancelar</button></p>
</div>
</form>

<script>
function limparTituloPergunta() {
    document.getElementById("titulo_pergunta").value = '';
}

let contador = 0;
function duplicarPergunta() {
  console.log('teste');
  contador++;
  let conteudo = `<div class="input-group mb-3" id="div_pergunta_${contador}">
                  <input type="text" class="form-control" name="resposta_pergunta[]" id="resposta_pergunta_${contador}" placeholder="Opção de resposta" aria-label="Escreva o conteúdo da pergunta:" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-danger" type="button" id="btn-remove-pergunta" onClick="removerPergunta('div_pergunta_${contador}')">-</button>
                  </div>
                </div>` ;
  $("#lista_respostas").append(conteudo);
}

function removerPergunta(idDivPergunta) {
  $(`#${idDivPergunta}`).remove();
}

document.getElementById('registrar_pergunta').addEventListener("click", function() {

  let url = "http://localhost/projeto_integrador_senac/app/operacoes/perguntas.operacoes.php"; // URL da API
  
  let dados = { 
    "titulo_pergunta": $("#titulo_pergunta").val(),
    "pergunta_id" : $("#pergunta_id").val(),
    "resposta_pergunta": $('input[name="resposta_pergunta[]"]').map(function() {
      return this.value;
    }).get(),
    "status": $("#status").val()
  };

  $.ajax({
    url: url+'',
    data: dados,
    method: "POST",
    success: function(data) {
      swal("Registro Salvo com sucesso !!!", {
        buttons: {
          catch: {
            text: "Sucesso ao Salvar !",
            value: "catch",
          }
        },
      })
      .then((value) => {
        switch (value) {
          case "catch":
            swal("Sucesso !", "Ok Vamos nessa!", "success");
            //setTimeout(() => { window.location.reload() }, 3000);
            break;
        }
      });
    }, 
    error: function(error) {
      console.log('error', error);
    }
  });
    
})

function mostrar_opcoes(id_pergunta) {
  let titulo_pergunta = $("#opcao_"+id_pergunta).html();
  $('#titulo_modal_opcoes').html(titulo_pergunta);
  $('#modal_perguntas').modal('toggle')

  $.ajax({
    method: 'GET',
    url: 'http://localhost/projeto_integrador_senac/app/operacoes/perguntas.operacoes.php?pesquisar=true&id=' + id_pergunta, 
    success: function (data) {
      
      let dados = JSON.parse(data);

      let listaOp = "";
      for (let i = 0; i < dados.length; i++) {
        listaOp += `<li class="list-group-item">${dados[i].descricao}</li>`;
      }

      $("#lista_opcoes_perguntas").html(listaOp);
    }, 
    error: function (error) {
      alert("Error");
      console.log(error);
    }
  })


}
</script>

</div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    
    <table class="table table-bordered table-striped datatable">
      <thead>
        <tr>
          <th>ID</th>
          <th>Descrição</th>
          <th>N° de Opções</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>

      <?php foreach($lista_perguntas_contagem as $pergunta) { 
        echo "<tr>
                <td>{$pergunta["id"]}</td>
                <td id='opcao_{$pergunta["id"]}'>{$pergunta["descricao"]}</td>
                <td>{$pergunta["total_options"]}</td>
                <td>
                  <button type='button' class='btn btn-primary'><i class='fas fa-pen'></i></button> 
                  <button type='button' class='btn btn-danger'><i class='fas fa-trash'></i></button> 
                  <button type='button' class='btn btn-info' onclick='mostrar_opcoes({$pergunta["id"]})'><i class='fas fa-eye'></i></button>
                </td>
              </tr>";
        }
      ?>
      </tbody>
    </table>

  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_perguntas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titulo_modal_opcoes">----</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
      <div class="card">
        <ul class="list-group list-group-flush" id="lista_opcoes_pergunta">
        </ul>
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>


                            