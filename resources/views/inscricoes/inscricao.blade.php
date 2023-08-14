@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Inscrição')
@section('content')
<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Inscrição</h4>
        <a href="{{ route('inscricao.create') }}" class="btn btn-primary">Fazer inscrição</a>
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
        <div>
            Formulário de inscrição aqui.
        </div>
    </div>
</div>
<!-- Simple Datatable End -->
@endsection
