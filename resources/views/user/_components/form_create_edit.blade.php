<form method="post" action="{{ route('candidato.dados',  [$user->id]) }}">
    @csrf
    @method('PUT')
    <div class="pd-20 card-box mb-30">

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nome da mãe</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="nome_mae" value="{{ $user->nome_mae ?? old('nome_mae') }}">
            </div>
            @error('nome_mae')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Data de
                nascimento</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Escolha uma data ou digite" type="date" name="dt_nascimento">
            </div>
            @error('dt_nascimento')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Escolaridade</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" id="exampleFormControlSelect1" name="escolaridade">
                    <option selected disabled>-- Escolaridade --</option>
                    <option>Ensino Médio Completo</option>
                    <option>Ensino Superior Incompleto</option>
                    <option>Ensino Superior Completo</option>
                    <option>Mestre</option>
                    <option>Doutor</option>
                </select>
            </div>
            @error('escolaridade')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Grupo</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="grupo">
            </div>
            @error('grupo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Endereço</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="endereco" placeholder="Rua">
            </div>
            @error('endereco')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Complemento</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="complemento" placeholder="Complemento">
            </div>
            @error('complemento')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Bairro</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="bairro" placeholder="Bairro">
            </div>
            @error('bairro')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Cidade</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="cidade" placeholder="Cidade">
            </div>
            @error('cidade')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">UF</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="uf" placeholder="UF" size="2">
            </div>
            @error('uf')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">CEP</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="cep" placeholder="CEP">
            </div>
            @error('cep')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">RG</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="numeric" name="rg" placeholder="RG">
            </div>
            @error('rg')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Orgão expedidor</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="org_exp" placeholder="Orgão expedidor">
            </div>
            @error('org_exp')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Data Emissão</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="date" name="dt_emissao" placeholder="Data Emissão">
            </div>
            @error('dt_emissao')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Telefone</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="tel" name="telefone" placeholder="12 93456-7890">
            </div>
            @error('telefone')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
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
            @error('sexo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="actions clearfix" style="padding: 10px">
        <ul role="menu" aria-label="Pagination">
            <button class="btn btn-primary" type="submit">
                Cadastrar
            </button>
            <button type="cancel" class="btn btn-danger">
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
