@if(isset($oferta->id))
    <form method="post" action="{{ route('oferta.update', [$oferta]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('oferta.store') }}">
        @csrf
@endif

    <select name="edital_id">
        <option>-- Selecione um Edital --</option>

        @foreach($editais as $edital)
            <option value="{{ $edital->id }}" {{ ($oferta->edital_id ?? old('edital_id')) == $edital->id ? 'selected' :
                '' }} >{{ $edital->nome_edital }}</option>
        @endforeach
    </select>
    <br>
    {{ $errors->has('edital_id') ? $errors->first('edital_id') : '' }}
    <div class="form-group">
        <label for="">Curso</label>
            <input type="text" class="form-control" name="curso" value="{{ $oferta->curso ?? old('curso') }}"
                placeholder="Curso">
            {{ $errors->has('curso') ? $errors->first('curso') : '' }}
    </div>
    <div class="form-group">
        <label for="">Disciplina</label>
            <input type="text" class="form-control" name="disciplina"
                value="{{ $oferta->disciplina ?? old('disciplina') }}" placeholder="Disciplina">
            {{ $errors->has('disciplina') ? $errors->first('disciplina') : '' }}
    </div>
    <div class="form-group">
        <label for="">Carga horária</label>
            <input type="numeric" class="form-control" name="carga_horaria"
                value="{{ $oferta->carga_horaria ?? old('carga_horaria') }}" placeholder="Carga horária">
            {{ $errors->has('carga_horaria') ? $errors->first('carga_horaria') : '' }}
    </div>
    <div class="form-group">
            <button type="submit" class="btn btn-block btn-success">SALVAR</button>
    </div>
<form>
