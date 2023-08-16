@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Editar curriculo')
@section('content')

    <div class="">

        <div class="">
            <p>Editar Curriculo</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('curriculo.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('curriculo._components.form_create_edit', ['curriculo' => $curriculo])
                @endcomponent
            </div>
        </div>

    </div>

@endsection

