@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Lista de Pontuação')
@section('content')

<div class="">

    <div class="">
        <p>Adicionar Pontuação</p>
    </div>
    @if(Session::has('danger'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('danger') }}
    </div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <div class="menu">
        <ul>
            <li><a href="{{ route('pontuacao.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            @component('pontuacao._components.form_create_edit', ['ofertas' => $ofertas, 'pontuacoes' => $pontuacoes])
            @endcomponent
        </div>
    </div>

</div>

@endsection
