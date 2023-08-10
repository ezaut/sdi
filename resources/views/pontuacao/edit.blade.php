@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Editar')
@section('content')

<div class="">

    <div class="">
        <p>Editar Pontuação</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('pontuacao.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            @component('pontuacao._components.form_create_edit', compact('pontuacao', 'ofertas'))
            @endcomponent
        </div>
    </div>

</div>


@endsection

