<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <h4 class="text-blue h4">Cadastro do candidato</h4>
        <p class="mb-30"></p>
    </div>
    <div class="wizard-content">
        @if(isset($user->id))
        <form action="{{ route('candidato.update', [$user]) }}" id="form" method="post"
            class="tab-wizard wizard-circle wizard">
            @csrf
            @method('PUT')
            @else
            <form action="{{route('candidato.create')}}" id="form" method="post"
                class="tab-wizard wizard-circle wizard">
                @csrf
                @endif
                @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{Session::get('fail')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if (Session::get('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <h5>Informações de Login</h5>
                <section>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome completo :</label>
                                <input name="name" id="name" type="text" class="form-control"
                                    value="{{ Auth::user()->name }}" disabled />
                            </div>
                            @error('name')
                            <div class="d-block text-danger" style="margin-top: -25px;">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>CPF :</label>
                                <input class="form-control" id="cpf" type="numeric" name="cpf" value="{{ Auth::user()->cpf }}" disabled>
                            </div>
                            @error('cpf')
                            <div class="d-block text-danger" style="margin-top: -25px;">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email :</label>
                                <input class="form-control" id="email" type="email" name="email" value="{{ Auth::user()->email }}" disabled>
                            </div>
                            @error('email')
                            <div class="d-block text-danger" style="margin-top: -25px;">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password :</label>
                                <input name="password" id="password" type="password" class="form-control"
                                value="{{ Auth::user()->password }}" disabled/>
                            </div>
                            @error('password')
                            <div class="d-block text-danger" style="margin-top: -25px;">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </section>
                <!-- Step 2 -->
                <h5>Informações Pessoais</h5>
                <section>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gênero :</label>
                                <select class="form-control" id="Selectsexo" onchange="habilitarCampos()" name="sexo" >
                                    <option selected disabled>-- Gênero --</option>
                                    <option>Feminino</option>
                                    <option>Masculino</option>
                                    <option value="outro">Outro(Qual?)</option>
                                    <option>Prefiro não dizer</option>
                                </select>
                                <!-- caso Outro, habilitar -->
                                <input class="form-control" id="InputSelectsexo" type="text" name="sexo" placeholder="Qual?" disabled>
                            </div>
                            @error('sexo')
                            <div class="d-block text-danger" style="margin-top: -25px;">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome da Mãe :</label>
                                <input id="nome_mae" name="nome_mae" type="text" placeholder="Nome da mãe" class="form-control"
                                value="{{ $user->nome_mae ?? old('nome_mae') }}" required />
                            </div>
                            @error('nome_mae')
                            <div class="d-block text-danger" style="margin-top: -25px;">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Data de Nascimento :</label>
                                <input id="date" name="dt_nascimento" type="date" class="form-control"
                                value="{{ $user->dt_nascimento ?? old('dt_nascimento') }}" required />
                            </div>
                            @error('dt_nascimento')
                            <div class="d-block text-danger" style="margin-top: -25px;">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Escolaridade :</label>
                                <select class="form-control" id="escolaridade" name="escolaridade">
                                    <option selected disabled>-- Escolaridade --</option>
                                    <option>Ensino Médio Completo</option>
                                    <option>Ensino Superior Incompleto</option>
                                    <option>Ensino Superior Completo</option>
                                    <option>Mestre</option>
                                    <option>Doutor</option>
                                </select>
                            </div>
                            @error('escolaridade')
                            <div class="d-block text-danger" style="margin-top: -25px;">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Grupo :</label>
                                <input id="grupo" name="grupo" type="text" class="form-control" value="{{ $user->grupo ?? old('grupo') }}"
                                    required />
                            </div>
                            @error('grupo')
                            <div class="d-block text-danger" style="margin-top: -25px;">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </section>
                <!-- Step 3 -->
                <h5>Endereço</h5>
                <section>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Endereço :</label>
                                <input id="endereco" name="endereco" type="text"  placeholder="Rua" class="form-control"
                                value="{{ $user->endereco ?? old('endereco') }}" required />
                            </div>
                            @error('endereco')
                            <div class="d-block text-danger" style="margin-top: -25px;">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label>Complemento :</label>
                                <input id="complemento" name="complemento" type="text"  placeholder="Complemento" class="form-control"
                                value="{{ $user->complemento ?? old('complemento') }}" />
                            </div>
                            @error('complemento')
                            <div class="d-block text-danger" style="margin-top: -25px;">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label>Bairro :</label>
                                <input id="bairro" name="bairro" type="text" placeholder="Bairro" class="form-control"
                                value="{{ $user->bairro ?? old('bairro') }}" required />
                            </div>
                            @error('bairro')
                            <div class="d-block text-danger" style="margin-top: -25px;">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cidade :</label>
                                <input id="cidade" name="cidade" type="text" placeholder="Cidade" class="form-control"
                                value="{{ $user->cidade ?? old('cidade') }}" required />
                            </div>
                            @error('cidade')
                            <div class="d-block text-danger" style="margin-top: -25px;">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label>UF :</label>
                                <input id="uf" name="uf" type="text" class="form-control" placeholder="UF"  minlength="2" maxlength="2"
                                value="{{ $user->uf ?? old('uf') }}" required />
                            </div>
                            @error('uf')
                            <div class="d-block text-danger" style="margin-top: -25px;">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label>CEP :</label>
                                <input id="cep" name="cep" type="text" class="form-control" maxlength="10"
                                    placeholder="Formato: 00.000-000" value="{{ $user->cep ?? old('cep') }}" required />
                            </div>
                            @error('cep')
                            <div class="d-block text-danger" style="margin-top: -25px;">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </section>
                <!-- Step 4 -->
                <h5>Documentos Pessoais</h5>
                <section>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>RG :</label>
                                <input id="rg" name="rg" type="numeric" step="1" placeholder="RG" class="form-control"
                                value="{{ $user->rg ?? old('rg') }}" required />
                            </div>
                            @error('rg')
                            <div class="d-block text-danger" style="margin-top: -25px;">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label>Orgão Expedidor :</label>
                                <input id="org_exp" name="org_exp" type="text" placeholder="Orgão Expedidor" class="form-control"
                                value="{{ $user->org_exp ?? old('org_exp') }}" required />
                            </div>
                            @error('org_exp')
                            <div class="d-block text-danger" style="margin-top: -25px;">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Data de Emissão :</label>
                                <input id="date" name="dt_emissao" type="date" class="form-control"
                                value="{{ $user->dt_emissao ?? old('dt_emissao') }}" required />
                            </div>
                            @error('dt_emissao')
                            <div class="d-block text-danger" style="margin-top: -25px;">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label>Telefone :</label>
                                <input id="tel" name="telefone" type="tel" class="form-control"
                                    pattern="[0-9]{2}9[0-9]{4}-[0-9]{4}" value="{{ $user->telefone ?? old('telefone') }}" placeholder="12 93456-7890" required />
                            </div>
                            @error('telefone')
                            <div class="d-block text-danger" style="margin-top: -25px;">
                                {{$message}}
                            </div>
                            @enderror

                        </div>
                    </div>
                </section>
            </form>
    </div>
</div>
@if (Session::get('success'))
<!-- success Popup html Start -->
<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h3 class="mb-20">Formulário enviado!</h3>
                <div class="mb-30 text-center">
                    <img src="/back/vendors/images/success.png" />
                </div>
                Formulário enviado com sucesso!
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-second" data-dismiss="modal">
                    Feito
                </button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </div>
</div>
<!-- success Popup html End -->
@else
<!-- fail Popup html Start -->
<div class="modal fade" id="fail-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h3 class="mb-20">Formulário não enviado!</h3>
                <div class="mb-30 text-center">
                    <img src="/back/vendors/images/cross.png" />
                </div>
                Formulário não enviado, tente fazer o cadastro outra vez!
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    Tente outra vez
                </button>
            </div>
        </div>
    </div>
</div>
<!-- fail Popup html End -->
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
