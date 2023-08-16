@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Visualizar Oferta')
@section('content')

    <div class="">

        <div class="">
            <p>Visualizar Oferta</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('oferta.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <table class="data-table table stripe hover nowrap" style="text-align: left">
                    <tr>
                        <td>Edital:</td>
                        <td>{{ $oferta->edital->nome_edital }}</td>
                    </tr>
                    <tr>
                        <td>Curso:</td>
                        <td>{{ $oferta->curso }}</td>
                    </tr>
                    <tr>
                        <td>Disciplina:</td>
                        <td>{{ $oferta->disciplina }}</td>
                    </tr>
                    <tr>
                        <td>Carga horária:</td>
                        <td>{{ $oferta->carga_horaria }}</td>
                    </tr>

                </table>
                <form action="{{ route('oferta.destroy', $oferta->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger m-0">Deletar</button>
                </form>
            </div>
        </div>

    </div>

@endsection

