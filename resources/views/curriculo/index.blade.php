@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Curriculo')
@section('content')
<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        {{-- <h4 class="text-blue h4">Curriculo</h4> --}}
        <a href="{{ route('curriculo.create') }}" class="btn btn-primary">Adicionar Curriculo</a>
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
                    <th >#</th>
                    <th>Grupo</th>
                    <th>Descrição</th>
                    <th>Link dos documentos</th>
                    <th>Pontos</th>
                    <th>User Id</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($curriculos->count() > 0)
                @foreach($curriculos as $curr)
                @if (Auth::user()->id == $curr->user_id)
                <tr>
                    <td class="table-plus">{{ $loop->iteration }}</td>
                    <td>{{ $curr->grupo }}</td>
                    <td>{{ $curr->descricao }}</td>
                    <td>{{ $curr->link_documento }}</td>
                    <td>{{ $curr->pontos }}</td>
                    <td>{{ $curr->user_id }}</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="{{ route('curriculo.show', $curr->id) }}"><i class="dw dw-eye"></i> Detalhes</a>
                                <a class="dropdown-item" href="{{ route('curriculo.edit', $curr->id)}}"><i class="dw dw-edit2"></i> Editar</a>
                                <form action="{{ route('curriculo.destroy', $curr->id) }}"  method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="dropdown-item" href="{{ route('curriculo.destroy', $curr->id) }}" onclick="event.preventDefault();
                                    this.closest('form').submit();"><i class="dw dw-delete-3"></i> Deletar</a>
                                </form>

                            </div>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach
                @else
                <tr>
                    <td class="text-center" colspan="6">Curriculo não encontrado</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<!-- Simple Datatable End -->
@endsection
