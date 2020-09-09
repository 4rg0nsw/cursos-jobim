@extends('admin.layouts.app')

@section('title', 'Editar curso')
    

@section('content')
    <h1>Editar Curso</h1>
<form action="{{ route('cursos.update', $curso->id) }}" method="post">
    @method('PUT')
    @csrf
    <div class="form-group">
        <input type="text" name="name" class="form-control"  value="{{ $curso->name }}">
    </div>
    <button type="submit" class="btn btn-success">Enviar</button>
</form>
@endsection