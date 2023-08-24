@if(isset($curriculo->id))
<form method="post" action="{{ route('curriculo.update', ['curriculo' => $curriculo->id]) }}">
    @csrf
    @method('PUT')
    @else
    <form method="post" action="{{ route('curriculo.store') }}">
        @csrf
        @endif
        @if(($errors->has('user_id')))
        <div class="alert alert-danger" role="alert">
            <span >{{ $errors->has('user_id') ? $errors->first('user_id') : '' }}</span>
        </div>
        @endif
        <div class="form-group">
            <label for="">Grupo</label>
            <input type="text" class="form-control" name="grupo" value="{{ $curriculo->grupo ?? old('grupo') }}"
                placeholder="Grupo">
            {{ $errors->has('grupo') ? $errors->first('grupo') : '' }}
        </div>
        <div class="form-group">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="descricao"
                    value="{{ $curriculo->descricao ?? old('descricao') }}"
                    rows="3">{{ $curriculo->descricao ?? old('descricao') }}</textarea>
            </div>
            {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
        </div>
        <div class="form-group">
            <label for="">Link dos documentos</label>
            <input type="url" class="form-control" name="link_documento"
                value="{{ $curriculo->link_documento ?? old('link_documento') }}"
                placeholder="Adicione o link dos documentos">
            {{ $errors->has('link_documento') ? $errors->first('link_documento') : '' }}
        </div>
        <div class="form-group">
            <label for="">Pontos</label>
            <input type="text" class="form-control" name="pontos" value="{{ $curriculo->pontos ?? old('pontos') }}"
                placeholder="Total de pontos obtidos">
            {{ $errors->has('pontos') ? $errors->first('pontos') : '' }}
        </div>
        <div>
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-block btn-success">SALVAR</button>
        </div>
    </form>
