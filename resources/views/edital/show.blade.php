@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Visualizar Edital')
@section('content')

    <div class="">

        <div class="">
            <p>Visualizar Edital</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('edital.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <table border="1" style="text-align: left">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $edital->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td>{{ $edital->nome_edital }}</td>
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

    </div>

@endsection
