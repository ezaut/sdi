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
        <div class="pb-20" style="width: 70%; margin-left: auto; margin-right: auto;">
            <table style="text-align: left" class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th>ID:</th>
                        <th>Grupo:</th>
                        <th>Descrição:</th>
                        <th>Link do documento:</th>
                        <th>Pontos:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $curriculo->id }}</td>
                        <td>{{ $curriculo->grupo }}</td>
                        <td>{{ $curriculo->descricao }}</td>
                        <td>{{ $curriculo->link_documento }}</td>
                        <td>{{ $curriculo->pontos }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
