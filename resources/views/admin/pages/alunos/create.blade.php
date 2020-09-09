@extends('admin.layouts.app')

@section('title', 'Cadastrar novo aluno')
    
@section('content')
    <h1>Cadastrar Novo Aluno</h1>

@include('admin.alerts.includes.alerts')

<form action="{{ route('alunos.store') }}" method="post" class="form">
    @csrf
    <div class="form-group">
        <input type="text" name="name" class="form-control"   placeholder="Nome:"  value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <input type="text" name="email" class="form-control" placeholder="Email:"  value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <input type="text" name="data" class="form-control" placeholder="Data de nascimento:"  value="{{ old('data') }}">
    </div>
    <div class="form-group">
        <input type="text" name="cursos" class="form-control" placeholder="Cursos:"  value="{{ old('cursos') }}">
    </div>

    <button type="submit" class="btn btn-success">Enviar</button>
</form>
<a href="{{ route('alunos.index') }}">Voltar</a>
@endsection

