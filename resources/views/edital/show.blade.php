@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Visualizar edital')
@section('content')

    <div class="">



        <div class="menu">
            <ul>
                <li><a href="{{ route('edital.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="">
            <div style="width: 70%; margin-left: auto; margin-right: auto;">
                <table class="data-table table stripe hover display" style="text-align: left">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $edital->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td class="table-cell">{{ $edital->nome_edital }}</td>
                    </tr>
                    <tr>
                        <td>Data de início:</td>
                        <td>{{ $edital->dt_inicio }}</td>
                    </tr>
                    <tr>
                        <td>Data do fim:</td>
                        <td>{{ $edital->dt_fim }}</td>
                    </tr>

                </table>

            </div>
        </div>
        @auth
            <a type="button" class="btn btn-info" href="{{ route('servidor.inscricoes.show', $edital->id) }}">Lista de inscritos</a>
        @endauth

    </div>
@endsection

