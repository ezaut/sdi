@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Lista de Editais')
@section('content')
<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Lista de Editais</h4>
        <a href="{{ route('edital.create') }}" class="btn btn-primary">Adicionar Edital</a>
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
        <table class="data-table table stripe hover nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">#</th>
                    <th>Nome do Edital</th>
                    <th>Data de início</th>
                    <th>Data do fim</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($edital->count() > 0)
                @foreach($edital as $ed)
                <tr>
                    <td class="table-plus">{{ $loop->iteration }}</td>
                    <td>{{ $ed->nome_edital }}</td>
                    <td>{{ $ed->dt_inicio }}</td>
                    <td>{{ $ed->dt_fim }}</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="{{ route('edital.show', $ed->id) }}"><i class="dw dw-eye"></i> Detalhes</a>
                                <a class="dropdown-item" href="{{ route('edital.edit', $ed->id)}}"><i class="dw dw-edit2"></i> Editar</a>
                                <a class="dropdown-item" href="{{ route('edital.destroy', $ed->id) }}"><i class="dw dw-delete-3"></i> Deletar</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td class="text-center" colspan="5">Edital não encontrado</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<!-- Simple Datatable End -->
@endsection
