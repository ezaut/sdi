@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Editar')
@section('content')

<div class="">

    <div class="">
        <p>Editar Candidato</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('home') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    @foreach(['success', 'warning', 'info', 'message'] as $alert)
    @if (Session::has($alert))
        <div class="alert alert-{{$alert}}" role="alert">{{Session::get($alert)}}</div>
    @endif
    @endforeach
    <div class="">
        <div style="width: 60%; margin-left: auto; margin-right: auto;">
            @component('user._components.form_create_edit', ['user' => $user])
            @endcomponent
        </div>
    </div>

</div>

@endsection
