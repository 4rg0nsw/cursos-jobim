@extends('admin.layouts.app')

@section('title', '- Lista de Alunos')

@section('content')
    <h1>Lista de Alunos</h1>
    <a href="{{ route('alunos.create') }}" class="btn btn-primary">Cadastrar Alunos</a>
    <hr>

    <form action="{{ route('alunos.search') }}" method="post" class="form form-inline">
        @csrf
    <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
        <button type="submit" class="btn btn-info">Pesquisar Aluno</button>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Curso(s) Matriculado(s)</th>
                <th width="100px">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->name }}</td> 
                    <td>{{ $aluno->cursos }}</td>
                <th>
                    <a href="{{ route('alunos.edit', $aluno->id) }}" > Editar </a>
                    <a href="{{ route('alunos.show', $aluno->id) }}" > Detalhes </a>
                </th>
                </tr>
            @endforeach
        </tbody>
        
    </table>
    @if (isset($filters))
        {!! $alunos->appends($filters)->links() !!}    
    @else
        {!! $alunos->links() !!}
@endif
@endsection