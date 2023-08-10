@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Lista de Editais')
@section('content')

<div class="">

    <div class="">
        <p>Adicionar Edital</p>
    </div>
    @if(Session::has('danger'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('danger') }}
    </div>
    @endif
    <div class="menu">
        <ul>
            <li><a href="{{ route('edital.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            @component('edital._components.form_create_edit')
            @endcomponent
        </div>
    </div>

</div>

@endsection
