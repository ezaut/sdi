@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Inscrições')
@section('content')
<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Lista de inscrições {{ $edital->nome_edital }}</h4>
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

                    <th>Candidato</th>
                    <th>Vaga escolhida</th>
                    <th>Data da inscrição</th>
                    <th>Link dos documentos</th>
                    <th>Situação</th>
                    <th class="datatable-nosort">Ação</th>
                </tr>
            </thead>
            <tbody>
                @if($inscricoes->count() > 0)
                @foreach($inscricoes as $inscricao)
                <tr>

                    <td>{{ $inscricao->user->name }}</td>
                    <td>{{ $inscricao->vaga_escolhida }}</td>
                    <td>{{ date('d/m/Y', strtotime($inscricao->dt_inscricao)) }}</td>
                    <td>{{ $inscricao->curriculo->link_documento }}</td>
                    <td>{{ $inscricao->curriculo->valido_invalido ? 'Válido' : 'Inválido' }} </td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="{{ route('servidor.inscricao.show', $inscricao) }}"><i class="dw dw-eye"></i> Detalhes</a>
                                <a class="dropdown-item" href="{{ route('servidor.inscricao.edit', $inscricao)}}"><i class="dw dw-edit2"></i> Editar</a>


                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td class="text-center" colspan="7">Inscrição não encontrada</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<!-- Simple Datatable End -->
@endsection
