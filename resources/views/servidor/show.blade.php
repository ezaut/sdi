@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Visualizar Inscrição')
@section('content')

    <div class="">

        <div class="">
            <p>Visualizar Inscrição</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('edital.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <table class="data-table table stripe hover nowrap" style="text-align: left">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $inscricao->id }}</td>
                    </tr>
                    <tr>
                        <td>Candidato:</td>
                        <td>{{ $inscricao->user->name}}</td>
                    </tr>
                    <tr>
                        <td>Nome do edital:</td>
                        <td>{{ $inscricao->edital->nome_edital }}</td>
                    </tr>
                    <tr>
                        <td>Data da inscrição:</td>
                        <td>{{ $inscricao->dt_inscricao }}</td>
                    </tr>
                    <tr>
                        <td>Link dos documentos:</td>
                        <td>{{ $inscricao->curriculo->link_documento }}</td>
                    </tr>
                    <tr>
                        <td>Situação da inscrição:</td>
                        <td>{{ $inscricao->curriculo->valido_invalido }}</td>
                    </tr>
                </table>

            </div>
        </div>
        @auth
            <a type="button" class="btn btn-info" href="{{ route('servidor.inscricoes.inscricoes.edital', $inscricao->edital->id) }}">Acessar a lista de inscritos</a>
        @endauth

    </div>

@endsection
