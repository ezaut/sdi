@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Adicionar Informações')
@section('subTitle', isset($subTitle) ? $subTitle : 'Candidato')
@section('content')

<div class="">

    <div class="">
        <p>Dados</p>
    </div>
    @if(Session::has('danger'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('danger') }}
    </div>
    @endif

    <div class="">
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
                @component('user._components.form_create_edit', ['user' => $user])
                @endcomponent
        </div>
    </div>

</div>

@endsection
