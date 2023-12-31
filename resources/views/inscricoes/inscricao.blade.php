@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Inscrição')
@section('content')
<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4 text-center">Inscrição</h4>
        @if ($curriculo == null)
            <h3 class="text-blue h4 text-left">Adicione primeiro o currículo para depois fazer a inscrição.</h3>
            <a href="{{ route('curriculo.create', ['user_id' => Auth::user()->id]) }}" class="btn btn-primary">Adicionar curriculo</a>
        @else

        {{--<a href="{{ route('inscricao.create', $edital->id) }}" id="fazerinscricao" class="btn btn-primary">Fazer inscrição</a>--}}
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
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Lista de Editais</h4>
        </div>



        <div class="pb-20">
            <table class="data-table table stripe hover display">
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
                        <td><a href="{{ route('inscricao.create', [$ed->id, $curriculo->id, Auth::user()->id] ) }}">{{ $ed->nome_edital }}</a></td>
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
</div>
<!-- Simple Datatable End -->
@endsection
