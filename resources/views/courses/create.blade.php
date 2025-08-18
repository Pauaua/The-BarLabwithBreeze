@extends('layout')

@section('content')
<div class="container">
    <h1>Crear Curso</h1>
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        @include('courses._form')
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection