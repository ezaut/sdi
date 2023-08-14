<form method="post" action="{{ route('inscricao.store') }}">
    @csrf
    <div class="pd-20 card-box mb-30">
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nome</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="name" value="{{ Auth::user()->name }}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">CPF</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="numeric" name="cpf" value="{{ Auth::user()->cpf }}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Email</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="email" name="email" value="{{ Auth::user()->email }}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nome da mãe</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="nome_mae">
            </div>
        </div>
        <div class="form-group row">
            <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Data de
                nascimento</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Escolha uma data ou digite" type="date" name="dt_nascimento">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Escolaridade</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" id="exampleFormControlSelect1" name="escolaridade">
                    <option selected disabled>-- Escolaridade --</option>
                    <option>Ensino Médio Completo</option>
                    <option>Ensino Superior Inconpleto</option>
                    <option>Ensino Superior Completo</option>
                    <option>Mestre</option>
                    <option>Doutor</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Grupo</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="grupo">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Endereço</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="endereco" placeholder="Rua">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Complemento</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="complemento" placeholder="Complemento">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Bairro</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="bairro" placeholder="Bairro">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Cidade</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="cidade" placeholder="Cidade">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">UF</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="uf" placeholder="UF" size="2">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">CEP</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="cep" placeholder="CEP">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">RG</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="numeric" name="rg" placeholder="RG">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Orgão expedidor</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="org_exp" placeholder="Orgão expedidor">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Data Emissão</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="date" name="dt_emissao" placeholder="Data Emissão">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Telefone</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="tel" name="telefone" placeholder="12 93456-7890"
                    pattern="[0-9]{2} 9[0-9]{4}-[0-9]{4}">
            </div>
        </div>
        <div class="form-group row">
            <!-- aqui, ao inves de sexo, gênero. Genero é como a pessoa se vê -->
            <label class="col-sm-12 col-md-2 col-form-label">Qual o seu gênero</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" id="Selectsexo" onchange="habilitarCampos()" name="sexo">
                    <option selected disabled>-- Gênero --</option>
                    <option>Feminino</option>
                    <option>Masculino</option>
                    <option value="outro">Outro(Qual?)</option>
                    <option>Prefiro não dizer</option>
                </select>
                <!-- caso Outro, habilitar -->
                <input class="form-control" id="InputSelectsexo" type="text" name="sexo" disabled>
            </div>
        </div>
        <label class="col-sm-12 col-md-2 col-form-label">Processo Seletivo</label>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nome</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="nome_edital" value="{{ $ed->nome_edital }}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Período de inscrição</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="dt_inicio" value="Do dia {{ date('d/m/Y', strtotime($ed->dt_inicio)) }} ao dia {{ date('d/m/Y', strtotime($ed->dt_fim)) }}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Área</label>
            <div class="col-sm-12 col-md-10">
                <select name="ofertas_id">
                    <option selected disabled>-- Selecione uma área --</option>
                    @foreach($ofertas as $of)
                        <option >{{ $of->curso }}</option>
                    @endforeach
                </select>
                <br>
                {{ $errors->has('ofertas_id') ? $errors->first('ofertas_id') : '' }}
            </div>
        </div>
    </div>
    <div class="actions clearfix" style="padding: 10px">
        <ul role="menu" aria-label="Pagination">
            <button class="btn btn-primary" type="submit">
                Cadastrar
            </button>
            <button type="button" class="btn btn-danger">
                Cancelar
            </button>
        </ul>
    </div>

</form>
<script>
    function habilitarCampos() {
	if($("#Selectsexo").val() == 'outro') {
		$("#InputSelectsexo").prop('disabled', false);
	} else {
  	$("#InputSelectsexo").prop('disabled', true);
  }
}
</script>
