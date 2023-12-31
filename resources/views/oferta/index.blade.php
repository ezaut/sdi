@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Lista de Ofertas')
@section('content')
<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <p class="text-info h4">Lista de Ofertas</p>
        <a href="{{ route('oferta.create') }}" class="btn btn-info">Adicionar Oferta</a>
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
                    <th>Disciplina</th>
                    <th>Carga Horária</th>
                    <th>ID Edital</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($oferta->count() > 0)
                @foreach($oferta as $of)
                <tr>
                    <td class="table-plus">{{ $loop->iteration }}</td>
                    <td>{{ $of->edital->nome_edital }}</td>
                    <td>{{ $of->curso }}</td>
                    <td>{{ $of->disciplina }}</td>
                    <td>{{ $of->carga_horaria }}</td>
                    <td>{{ $of->edital_id }}</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="{{ route('oferta.show', $of->id) }}"><i class="dw dw-eye"></i> Detalhes</a>
                                <a class="dropdown-item" href="{{ route('oferta.edit', $of->id)}}"><i class="dw dw-edit2"></i> Editar</a>
                                <form action="{{ route('oferta.destroy', $of->id) }}"  method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="dropdown-item" href="{{ route('oferta.destroy', $of->id) }}" onclick="event.preventDefault();
                                    this.closest('form').submit();"><i class="dw dw-delete-3"></i> Deletar</a>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td class="text-center" colspan="7">Oferta não encontrada</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<!-- Simple Datatable End -->
@endsection
