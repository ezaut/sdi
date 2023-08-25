@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Minhas Inscrições')
@section('content')
<div >
    <h1>Minhas Inscrições</h1>
</div>

<div>
    <table class="data-table table stripe hover nowrap">
        <thead>
            <tr>
                <th>Edital</th>
                <th>Vaga escolhida</th>
                <th>Data da inscrição</th>
                <th>Situação da inscrição</th>
            </tr>
        </thead>
        <tbody>
            @forelse($inscricoes as $inscricao)
                <tr>
                    <td>{{ $inscricao->edital->nome_edital }}</td>
                    <td>{{ $inscricao->vaga_escolhida }}</td>
                    <td>{{ date('d/m/Y', strtotime($inscricao->dt_inscricao)) }}</td>
                    <td>
                        <span class="font-weight-bold {{ $inscricao->curriculo->valido_invalido ? 'text-success' : 'text-danger' }}">
                            {{ $inscricao->curriculo->valido_invalido ? 'Válida' : 'Inválida' }}
                        </span>
                    </td>

                </tr>
            @empty
            <tr>
                <td colspan="4">Nenhuma inscrição encontrada!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
