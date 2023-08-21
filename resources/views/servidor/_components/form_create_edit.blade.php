<form method="post" action="{{ route('servidor.inscricao.update', ['inscricao' => $inscricao]) }}">
    @csrf
    @method('PUT')

        <div class="form-group">
            <label for="">Situação da inscrição:</label>
            <input type="numeric" class="form-control" id="meuInput" name="valido_invalido" value= {{ $inscricao->curriculo->valido_invalido ?? old('valido_invalido') }}>
            {{ $errors->has('valido_invalido') ? $errors->first('valido_invalido') : '' }}
        </div>
        <div class="alert alert-warning" role="alert">
            0 marca como Inválido<br>1 marca como Válido
          </div>


        <div class="form-group">
            <button type="submit" class="btn btn-block btn-success" >SALVAR</button>
        </div>
</form>
<!-- Aqui seria um script para trocar 0 e 1 por invalido e valido -->
<script>
    function alterarValor() {
    var valido_invalido = {{ $inscricao->curriculo->valido_invalido ?? old('valido_invalido') }};
    novoValor = valido_invalido ? "Válido" : "Inválido";
    document.getElementById("meuInput").value = novoValor;
}
</script>
