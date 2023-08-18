@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Visualizar curriculo')
@section('content')

    <div class="">

        <div class="">
            <p>Visualizar Curriculo</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('curriculo.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <table class="data-table table stripe hover nowrap" style="text-align: left">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $curriculo->id }}</td>
                    </tr>
                    <tr>
                        <td>Grupo:</td>
                        <td>{{ $curriculo->grupo }}</td>
                    </tr>
                    <tr>
                        <td>Descrição:</td>
                        <td>{{ $curriculo->descricao }}</td>
                    </tr>
                    <tr>
                        <td>Link do documento:</td>
                        <td>{{ $curriculo->link_documento }}</td>
                    </tr>
                    <tr>
                        <td>Pontos:</td>
                        <td>{{ $curriculo->pontos }}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

@endsection

