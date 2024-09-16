@extends('templates.main')

@section('content')
<form action="{{ route('autor.update', $autor->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label class="mt-3">Nome</label>
    <input type="text" name="nome" class="form-control" value="{{ $autor->nome }}" />

    <label class="mt-3">Apelido</label>
    <input type="text" name="apelido" class="form-control" value="{{ $autor->apelido }}" />

    <label class="mt-3">Nacionalidade</label>
    <input type="text" name="nacionalidade" class="form-control" value="{{ $autor->nacionalidade }}" />

    <label class="mt-3">Data de Nascimento</label>
    <input type="date" name="data_nascimento" class="form-control"
        value="{{ $autor->data_nascimento ? $autor->data_nascimento->format('Y-m-d') : '' }}" />

    <label class="mt-3">Email</label>
    <input type="email" name="email" class="form-control" value="{{ $autor->email }}" />

    <input type="submit" value="Alterar" class="btn btn-success mt-1">
</form>
@endsection