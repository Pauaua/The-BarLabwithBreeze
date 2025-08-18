@extends('layout')

@section('content')
<div class="container">
    <h1>Editar Curso</h1>
    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('courses._form')
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection