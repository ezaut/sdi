@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Informações')
@section('subTitle', isset($subTitle) ? $subTitle : 'Candidato')
@section('content')

<div class="">

    <div class="text-center" >
        <p>Dados do Candidato</p>
    </div>
    @if(Session::has('danger'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('danger') }}
    </div>
    @endif

    <div class="">
        <div style="width: 100%; margin-left: auto; margin-right: auto;">
                @component('user._components.form_create_edit', ['user' => $user])
                @endcomponent
        </div>
    </div>

</div>

@endsection
