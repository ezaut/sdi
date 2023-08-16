@extends('layouts.app')

@section('content')
    <h1>Inscrições no edital {{$edital->nome_edital}}</h1>

    <table class="data-table table stripe hover nowrap">
        <thead>
            <tr>
                <th>Edital</th>
                <th>Vaga escolhida</th>
                <th>Data da inscrição</th>
                <th>Situação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inscricoes as $inscricao)
                <tr>
                    <td>{{ $inscricao->edital_id }}</td>
                    <td>{{ $inscricao->vaga_escolhida }}</td>
                    <td>{{ date('d/m/Y', strtotime($inscricao->dt_inscricao)) }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
