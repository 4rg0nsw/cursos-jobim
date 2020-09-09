@extends('admin.layouts.app')

@section('title', '- Detahes do Aluno')

@section('content')

<h1>Detalhes do Aluno {{ $aluno->name }}</h1>
<a href="{{ route('alunos.index') }}">Voltar</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de nascimento</th>
            <th>Curso(s) Matriculado(s)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $aluno->name }}</td> 
            <td>{{ $aluno->email }}</td> 
            <td>{{ $aluno->data }}</td>
            <td>{{ $aluno->cursos }}</td>
        </tr>
    </tbody>
</table>
<form action="{{ route('alunos.destroy', $aluno->id) }}" method="post">
    @csrf
    @method('DELETE')
<button type="submit" class="btn btn-danger" >Deletar Aluno {{ $aluno->name }}</button>
</form>

@endsection