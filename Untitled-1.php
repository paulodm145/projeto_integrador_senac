<h1>Perguntas</h1>
<form id="meuFormulario" class="mt-5">

<label for="status">Agora cadastre as opções de resposta:</label>

<div class="form-group">
  <p><input type="text" class="form-control" id="opcao1" placeholder="Primeira Pergunta" class="form-control"></p>
</div>

<div class="form-group">
    <p><input type="text" id="opcao2" placeholder="Segunda Pergunta" class="form-control"></p>
</div>

<div class="form-group">
    <p><input type="text" id="opcao3" placeholder="Terceira Pergunta" class="form-control"></p>
</div>
  
<div class="form-group">
    <p><input type="text" id="opcao4" placeholder="Quarta Pergunta" class="form-control"></p>
</div>
   
<div class="form-group"> 
    <p><input type="text" id="opcao5" placeholder="Quinta Pergunta" class="form-control"></p>
</div>


<!-- ---------------------------------------------------------------- -->
<div class="input-group mb-3">
  <input type="text" class="form-control" name="" id="titulo_pergunta" placeholder="Escreva o conteúdo da pergunta:" aria-label="Escreva o conteúdo da pergunta:" aria-describedby="button-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" id="button-addon2" onClick="limparTituloPergunta()">Limpar Tudo</button>
  </div>
</div>
<!-- ---------------------------------------------------------------- -->

  <br>

  <label for="status">Ou selecione uma pergunta já existente:</label>
   <br><select name="status" id="status" class="dropdown-item"  >
      <option value="#">Pergunta11</option>
      <option value="#" >Pergunta22</option>
    </select></br>

<div class="form-group">
  <p><button type="submit" class="btn btn-primary">Registrar Pergunta</button>
  <button type="button" class="btn btn-danger" onclick="cancelarFormulario()">Cancelar</button></p>
</div>
</form>

<script>
function limparTituloPergunta() {
    document.getElementById("titulo_pergunta").value = '';
}
</script>