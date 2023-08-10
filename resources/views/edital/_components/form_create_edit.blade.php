@if(isset($edital->id))
<form method="post" action="{{ route('edital.update', ['edital' => $edital->id]) }}">
    @csrf
    @method('PUT')
    @else
    <form method="post" action="{{ route('edital.store') }}">
        @csrf
        @endif
        <div class="form-group">
            <label for="">Nome do Edital</label>
            <input type="text" class="form-control" name="nome_edital" value="{{ $edital->nome_edital ?? old('nome_edital') }}" placeholder="Nome edital">
            {{ $errors->has('nome_edital') ? $errors->first('nome_edital') : '' }}
        </div>
        <div class="form-group">
            <label for="">Data do início</label>
            <input type="date" class="form-control" name="dt_inicio" value="{{ $edital->dt_inicio ?? old('dt_inicio') }}" placeholder="Data de início">
            {{ $errors->has('dt_inicio') ? $errors->first('dt_inicio') : '' }}
        </div>
        <div class="form-group">
            <label for="">Data do fim</label>
            <input type="date" class="form-control" name="dt_fim" value="{{ $edital->dt_fim ?? old('dt_fim') }}" placeholder="Data do fim">
            {{ $errors->has('dt_fim') ? $errors->first('dt_fim') : '' }}
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-success" >SALVAR</button>
        </div>
</form>
