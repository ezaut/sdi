@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Admin - Home')
@section('content')

<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4 text-center">Lista de usuários</h4>
    </div>
    <table class="data-table table stripe hover nowrap">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th style="margin: 10px">Tipo atual</th>
                <th>Mudar tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->type }}</td>
                    <td>
                        <form action="{{ route('admin.updateUserType', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <select name="new_type">
                                <option value="{{$user->type}}">{{$user->type}} </option>
                                <option value="0">Usuário</option>
                                <option value="2">Supervisor</option>
                            </select>
                            <button class="btn btn-primary" type="submit">Atualizar Tipo</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
