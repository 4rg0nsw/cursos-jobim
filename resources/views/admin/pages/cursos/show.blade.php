@extends('admin.layouts.app')

@section('title', '- Detahes de Cursos')

@section('content')

<h1>Detalhes do Curso {{ $curso->name }}</h1>
<a href="{{ route('cursos.index') }}">Voltar</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nome</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $curso->name }}</td> 
        </tr>
    </tbody>
</table>
<form action="{{ route('cursos.destroy', $curso->id) }}" method="post">
    @csrf
    @method('DELETE')
<button type="submit" class="btn btn-danger" >Deletar Curso {{ $curso->name }}</button>
</form>
@endsection