@extends('admin.layouts.app')

@section('title', 'Editar aluno')
    

@section('content')
<h1>Editar Aluno #{{ $aluno->id }}</h1>
<a href="{{ route('alunos.index') }}">Voltar</a>

<form action="{{ route('alunos.update', $aluno->id) }}" method="post" class="form">
    @method('PUT')
    @csrf
    <div class="form-group">
        <input type="text" name="name" class="form-control"   placeholder="Nome:"  value="{{ $aluno->name }}">
    </div>
    <div class="form-group">
        <input type="text" name="email" class="form-control" placeholder="Email:"  value="{{ $aluno->email}}">
    </div>
    <div class="form-group">
        <input type="text" name="data" class="form-control" placeholder="Data de nascimento:"  value="{{ $aluno->data}}">
    </div>
    <div class="form-group">
        <input type="text" name="cursos" class="form-control" placeholder="Cursos:"  value="{{$aluno->cursos }}">
    </div>
    <button type="submit" class="btn btn-success">Enviar</button>
</form>
@endsection
