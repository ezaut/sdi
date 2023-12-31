@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Inscrição')
@section('subTitle', isset($subTitle) ? $subTitle : 'Criar')
@section('content')

<div class="">

    <div class="">
        <p>Inscrição</p>
    </div>
    @if(Session::has('danger'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('danger') }}
    </div>
    @endif
    <div class="menu">
        <ul>
            <li><a href="{{ route('inscricao.index') }}">Voltar</a></li>
            <li><a href="">{{ $ed->nome_edital }}</a></li>
        </ul>
    </div>

    <div class="">
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
            @component('inscricoes._components.form_create_edit', ['ed' => $ed, 'ofertas' => $ofertas, 'curr' => $curr])
            @endcomponent
        </div>
    </div>

</div>

@endsection
