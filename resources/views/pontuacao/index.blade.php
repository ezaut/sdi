@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Lista de Pontuações')
@section('content')
<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <p class="text-info h4">Lista de Pontuações</p>
        <a href="{{ route('pontuacao.create') }}" class="btn btn-info">Adicionar Pontuação</a>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    @if(Session::has('danger'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('danger') }}
    </div>
    @endif
    <div class="pb-20">
        <table class="data-table table stripe hover display">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Edital</th>
                    <th>Curso</th>
                    <th>Grupo</th>
                    <th>Pontos</th>
                    <th>Pontuação máxima</th>
                    <th>Descrição</th>
                    <th>Nome da Oferta</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($pontuacao->count() > 0)
                @foreach($pontuacao as $pon)
                <tr>
                    <td class="table-plus">{{ $loop->iteration }}</td>
                    <td>{{ $pon->oferta->edital->nome_edital }}</td>
                    <td>{{ $pon->oferta->curso }}</td>
                    <td>{{ $pon->grupo }}</td>
                    <td>{{ $pon->pontos }}</td>
                    <td>{{ $pon->pontuacao_max }}</td>
                    <td>{{ $pon->descricao }}</td>
                    <td>{{ $pon->oferta->curso }} {{ $pon->oferta->disciplina }}</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="{{ route('pontuacao.show', $pon->id) }}"><i class="dw dw-eye"></i> Detalhes</a>
                                <a class="dropdown-item" href="{{ route('pontuacao.edit', $pon->id)}}"><i class="dw dw-edit2"></i> Editar</a>
                                <form action="{{ route('pontuacao.destroy', $pon->id) }}"  method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="dropdown-item" href="{{ route('pontuacao.destroy', $pon->id) }}" onclick="event.preventDefault();
                                    this.closest('form').submit();"><i class="dw dw-delete-3"></i> Deletar</a>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td class="text-center" colspan="9">Pontuação não encontrada</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<!-- Simple Datatable End -->
@endsection
