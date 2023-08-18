@extends('layouts.app')

@section('content')
    <h1>Inscrições no edital {{$edital->nome_edital}}</h1>

    <table class="data-table table stripe hover nowrap">
        <thead>
            <tr>
                <th>Id do Candidato</th>
                <th>Vaga escolhida</th>
                <th>Data da inscrição</th>
                <th>Id do Curriculo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inscricoes as $inscricao)
                <tr>
                    <td>{{ $inscricao->user_id }}</td>
                    <td>{{ $inscricao->vaga_escolhida }}</td>
                    <td>{{ date('d/m/Y', strtotime($inscricao->dt_inscricao)) }}</td>
                    <td>{{ $inscricao->curriculo_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
