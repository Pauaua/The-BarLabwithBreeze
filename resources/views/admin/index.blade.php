@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1>Usuarios</h1>
  <a class="btn btn-primary" href="{{ route('admin.users.create') }}">Nuevo</a>
</div>

<form method="GET" class="mb-3">
  <input name="q" value="{{ request('q') }}" class="form-control" placeholder="Buscar por nombre o email">
</form>

@if(session('status')) <div class="alert alert-success">{{ session('status') }}</div> @endif
@if($errors->any()) <div class="alert alert-danger">{{ $errors->first() }}</div> @endif

<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th><th>Nombre</th><th>Email</th><th>Rol</th><th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $u)
    <tr>
      <td>{{ $u->id }}</td>
      <td><a href="{{ route('admin.users.show',$u) }}">{{ $u->name }}</a></td>
      <td>{{ $u->email }}</td>
      <td>{{ ucfirst($u->role) }}</td>
      <td class="d-flex gap-2">
        <a class="btn btn-sm btn-warning" href="{{ route('admin.users.edit',$u) }}">Editar</a>
        <form method="POST" action="{{ route('admin.users.destroy',$u) }}"
              onsubmit="return confirm('¿Eliminar usuario?');">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-danger">Eliminar</button>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>

{{ $users->links() }}
@endsection