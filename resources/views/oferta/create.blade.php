@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Lista de ofertas')
@section('content')

<div class="">

    <div class="">
        <p>Adicionar Oferta</p>
    </div>
    @if(Session::has('danger'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('danger') }}
    </div>
    @endif
    <div class="menu">
        <ul>
            <li><a href="{{ route('oferta.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            @component('oferta._components.form_create_edit', ['editais' => $editais])
            @endcomponent
        </div>
    </div>

</div>

@endsection
