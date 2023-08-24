@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Criar curriculo')
@section('content')

<div class="">

    @if(Session::has('danger'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('danger') }}
        </div>
    @endif
    <div class="menu">
        <ul>
            <li><a href="{{ route('curriculo.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            @component('curriculo._components.form_create_edit')
            @endcomponent
        </div>
    </div>

</div>

@endsection
