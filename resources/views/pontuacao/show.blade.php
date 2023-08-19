@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Visualizar Pontuação')
@section('content')

<div class="">

    <div class="">
        <p>Visualizar Pontuação</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('pontuacao.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="">
        <div style="width: 70%; margin-left: auto; margin-right: auto;">
            <table style="text-align: left" class="data-table table stripe hover nowrap">
                <tr>
                    <td>Edital:</td>
                    <td>{{ $pontuacao->oferta->edital->nome_edital }}</td>
                </tr>
                <tr>
                    <td>Curso:</td>
                    <td>{{ $pontuacao->oferta->curso }}</td>
                </tr>
                <tr>
                    <td>Grupo:</td>
                    <td>{{ $pontuacao->grupo }}</td>
                </tr>
                <tr>
                    <td>Pontos:</td>
                    <td>{{ $pontuacao->pontos }}</td>
                </tr>
                <tr>
                    <td>Pontuação máxima:</td>
                    <td>{{ $pontuacao->pontuacao_max }}</td>
                </tr>
                <tr>
                    <td>Descrição:</td>
                    <td>{{ $pontuacao->descricao }}</td>
                </tr>

            </table>
            <form action="{{ route('pontuacao.destroy', $pontuacao->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger m-0">Deletar</button>
            </form>
        </div>
    </div>

</div>
@endsection

