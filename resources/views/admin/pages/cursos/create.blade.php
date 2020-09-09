@extends('admin.layouts.app')

@section('title', 'Cadastrar novo curso')
    
@section('content')
    <h1> Cadastrar Novo Curso </h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

<form action="{{ route('cursos.store') }}" method="post" class="form">>
    @csrf
    <div class="form-group">
        <input type="text" name="name" class="form-control"   placeholder="Nome do Curso:"  value="{{ old('name') }}" >
    </div>
    <button type="submit" class="btn btn-success"> Enviar </button>
</form>
<a href="{{ route('cursos.index') }}">Voltar</a>
@endsection
