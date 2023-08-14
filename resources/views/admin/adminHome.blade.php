@extends('layouts.app')

@section('content')
<h1>Lista de Usuários</h1>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo atual</th>
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
                                <option value="0">Usuário</option>
                                <option value="2">Supervisor</option>
                            </select>
                            <button type="submit">Atualizar Tipo</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
