@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Editar')
@section('content')

    <div class="">

        <div class="">
            <p>Validar ou Indeferir inscrição</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="#" onclick="goBack()">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('servidor._components.form_create_edit', ['inscricao' => $inscricao])
                @endcomponent
            </div>
        </div>

    </div>
    @push('backHistory_scripts')
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    @endpush
@endsection
