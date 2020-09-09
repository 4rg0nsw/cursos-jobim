@extends('admin.layouts.app')

@section('title', '- Lista de Cursos')

@section('content')
    <h1>Lista de Cursos</h1>
    <a href="{{ route('cursos.create') }}" class="btn btn-primary">Cadastrar Cursos</a>

    <hr>

    <form action="{{ route('cursos.search') }}" method="post" class="form form-inline">
        @csrf
        <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
        <button type="submit" class="btn btn-info">Pesquisar Curso</button>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Curso</th>
                <th width="100px">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <td>{{ $curso->name }}</td>
                <th>
                    <a href="{{ route('cursos.edit', $curso->id) }}" > Editar </a>
                    <a href="{{ route('cursos.show', $curso->id) }}" > Detalhes </a>
                </th>
                </tr>
            @endforeach
        </tbody>
        
    </table>

    @if (isset($filters))
        {!! $cursos->appends($filters)->links() !!}    
    @else
        {!! $cursos->links() !!}
    @endif    
@endsection
