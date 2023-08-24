@if(isset($pontuacao->id))
    <form method="post" action="{{ route('pontuacao.update', [$pontuacao]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('pontuacao.store') }}">
        @csrf
@endif

    <select name="oferta_id">
        <option>-- Selecione uma Oferta --</option>

        @foreach($ofertas as $oferta)
            <option value="{{ $oferta->id }}" {{ ($pontuacao->oferta_id ?? old('oferta_id')) == $oferta->id ? 'selected' :
                '' }} >{{ $oferta->curso }}</option>
        @endforeach
    </select>
    <br>
    {{ $errors->has('oferta_id') ? $errors->first('oferta_id') : '' }}
    <div class="form-group">
        <label for="">Grupo</label>
            <input type="text" class="form-control" name="grupo" value="{{ $pontuacao->grupo ?? old('grupo') }}"
                placeholder="Grupo">
            {{ $errors->has('grupo') ? $errors->first('grupo') : '' }}
    </div>
    <div class="form-group">
        <label for="">Pontos</label>
            <input type="numeric" class="form-control" name="pontos"
                value="{{ $pontuacao->pontos ?? old('pontos') }}" placeholder="Pontos">
            {{ $errors->has('pontos') ? $errors->first('pontos') : '' }}
    </div>
    <div class="form-group">
        <label for="">Pontuação máxima</label>
            <input type="numeric" class="form-control" name="pontuacao_max"
                value="{{ $pontuacao->pontuacao_max ?? old('pontuacao_max') }}" placeholder="Pontuação máxima">
            {{ $errors->has('pontuacao_max') ? $errors->first('pontuacao_max') : '' }}
    </div>
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" id="descricao" cols="48" rows="5" >{{ $pontuacao->descricao ?? old('descricao') }}</textarea>
        {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
    </div>

    <div class="form-group">
            <button type="submit" class="btn btn-block btn-success">SALVAR</button>
    </div>
<form>
