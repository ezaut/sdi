<form method="post" action="{{ route('servidor.update', ['inscricao' => $inscricao]) }}">
    @csrf
    @method('PUT')

        <div class="form-group">
            <label for="">Situação da inscrição:</label>
            <input type="numeric" class="form-control" name="valido_invalido" value="{{ $inscricao->curriculo->valido_invalido ?? old('valido_invalido') }}" >
            {{ $errors->has('valido_invalido') ? $errors->first('valido_invalido') : '' }}
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-block btn-success" >SALVAR</button>
        </div>
</form>
