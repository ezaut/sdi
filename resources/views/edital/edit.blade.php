@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Editar')
@section('content')

    <div class="">

        <div class="">
            <p>Editar Edital</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('edital.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('edital._components.form_create_edit', ['edital' => $edital])
                @endcomponent
            </div>
        </div>

    </div>

@endsection

