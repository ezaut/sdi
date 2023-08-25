<form method="post" action="{{ route('servidor.inscricao.update', ['inscricao' => $inscricao]) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="">Situação da inscrição:</label>
        <div><input type="radio" class="" name="valido_invalido" value="1" @if ($inscricao->curriculo->valido_invalido)
            checked @endif> Válida
        </div>
        <div><input type="radio" class="" name="valido_invalido" value="0" @if (!$inscricao->curriculo->valido_invalido)
            checked @endif> Inválida
        </div>
        {{ $errors->has('valido_invalido') ? $errors->first('valido_invalido') : '' }}
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-block btn-success">SALVAR</button>
    </div>
</form>
