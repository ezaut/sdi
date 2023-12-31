@if(Auth::user()->nome_mae != null)
<form method="post" action="{{ route('inscricao.store', array('edital_id' => $ed->id, 'curriculo_id' => $curr->id, 'user_id' => Auth::user()->id)) }}">
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
                    <input class="form-control" type="text" name="nome_mae" value="{{ Auth::user()->nome_mae }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Data de
                    nascimento</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" placeholder="Escolha uma data ou digite" type="date" name="dt_nascimento" value="{{ Auth::user()->dt_nascimento }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Escolaridade</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" placeholder="Escolha uma data ou digite" type="text" name="escolaridade" value="{{ Auth::user()->escolaridade }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Grupo</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="grupo" value="{{ Auth::user()->grupo }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Endereço</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="endereco" placeholder="Rua" value="{{ Auth::user()->endereco }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Complemento</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="complemento" placeholder="Complemento" value="{{ Auth::user()->complemento }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Bairro</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="bairro" placeholder="Bairro" value="{{ Auth::user()->bairro }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Cidade</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="cidade" placeholder="Cidade" value="{{ Auth::user()->cidade}}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">UF</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="uf" placeholder="UF" size="2" value="{{ Auth::user()->uf }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">CEP</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="cep" placeholder="CEP" value="{{ Auth::user()->cep }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">RG</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="numeric" name="rg" placeholder="RG" value="{{ Auth::user()->rg }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Orgão expedidor</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="org_exp" placeholder="Orgão expedidor" value="{{ Auth::user()->org_exp }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Telefone</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="tel" name="telefone" placeholder="12 93456-7890" value="{{ Auth::user()->telefone }}" disabled>
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
                <label class="col-sm-12 col-md-2 col-form-label">Vaga</label>
                <div class="col-sm-12 col-md-10">
                    <select name="vaga_escolhida">
                        <option selected disabled>-- Selecione uma vaga --</option>
                        @foreach($ofertas as $of)
                            <option >{{ $of->curso }}</option>
                        @endforeach
                    </select>
                    <br>
                    {{ $errors->has('vaga_escolhida') ? $errors->first('vaga_escolhida') : '' }}
                </div>
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
@else
    <div class="text-center">
        <span><h2> Primeiro complete suas informações no menu <a href="{{ route('candidato.edit', Auth::user()->id  ) }}">Dados pessoais</a> </h2></span>
    </div>
@endif
<script>
    function habilitarCampos() {
	if($("#Selectsexo").val() == 'outro') {
		$("#InputSelectsexo").prop('disabled', false);
	} else {
  	$("#InputSelectsexo").prop('disabled', true);
  }
}
</script>
