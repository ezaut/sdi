@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Editar Oferta')
@section('content')

    <div class="">

        <div class="">
            <p>Editar Oferta</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('oferta.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('oferta._components.form_create_edit', compact('oferta', 'editais'))
                @endcomponent
            </div>
        </div>

    </div>

@endsection

