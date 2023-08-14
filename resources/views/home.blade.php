@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home - Candidato')
@section('content')
<div class="card-body">
    @if(auth()->user()->is_admin == 1)
    <a href="{{url('admin/routes')}}">Admin</a>
    @else
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Lista de Editais</h4>
        </div>

        <div class="pb-20">
            <table class="data-table table stripe hover nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Processo seletivo</th>
                        <th>Data de início</th>
                        <th>Data do fim</th>

                    </tr>
                </thead>
                <tbody>
                    @if($edital->count() > 0)
                    @foreach($edital as $ed)
                    <tr>
                        <td class="table-plus">{{ $loop->iteration }}</td>
                        <td><a href="{{ route('inscricao.create', $ed->id) }}">{{ $ed->nome_edital }}</a></td>
                        <td>{{ date('d/m/Y', strtotime($ed->dt_inicio)) }}</td>
                        <td>{{ date('d/m/Y', strtotime($ed->dt_fim)) }}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td class="text-center" colspan="4">Edital não encontrado</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    @endif
@endsection
