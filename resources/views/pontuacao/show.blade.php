@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Visualizar Pontuação')
@section('content')

<div class="">

    <div class="menu">
        <ul>
            <li><a href="{{ route('pontuacao.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="">
        <div class="pb-20" style="width: 70%; margin-left: auto; margin-right: auto;">
            <table style="text-align: left" class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th>Edital</th>
                        <th>Curso</th>
                        <th>Grupo</th>
                        <th>Pontos</th>
                        <th>Pontuação máxima</th>
                        <th>Descrição</th>
                        <th>Disciplina</th>
                        <th>Carga horária</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $pontuacao->oferta->edital->nome_edital }}</td>
                        <td>{{ $pontuacao->oferta->curso }}</td>
                        <td>{{ $pontuacao->grupo }}</td>
                        <td>{{ $pontuacao->pontos }}</td>
                        <td>{{ $pontuacao->pontuacao_max }}</td>
                        <td>{{ $pontuacao->descricao }}</td>
                        <td>{{ $pontuacao->oferta->disciplina }}</td>
                        <td>{{ $pontuacao->oferta->carga_horaria }}</td>
                    </tr>
                </tbody>

            </table>
            <form action="{{ route('pontuacao.destroy', $pontuacao->id) }}" method="POST" type="button"
                class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger m-0">Deletar</button>
            </form>

        </div>
    </div>

</div>
@endsection
