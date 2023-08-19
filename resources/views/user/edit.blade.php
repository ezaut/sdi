@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Editar')
@section('content')

    <div class="">

        <div class="">
            <p>Editar Candidato</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('candidato.show') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="">
            <div style="width: 100%; margin-left: auto; margin-right: auto;">
                @component('user._components.form_create_edit', ['user' => $user])
                @endcomponent
            </div>
        </div>

    </div>

@endsection
