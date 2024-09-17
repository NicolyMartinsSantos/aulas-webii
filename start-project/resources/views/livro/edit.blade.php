@extends('templates.main')

@section('content')
<form action="{{ route('livro.update', $livro->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label class="mt-3">Titulo</label>
    <input type="text" name="nome" class="form-control" value="{{ $livro->titulo }}" />

    <label class="mt-3">Descrição</label>
    <input type="text" name="description" class="form-control" value="{{ $livro->description }}" />

    <input type="submit" value="Alterar" class="btn btn-success mt-1">
</form>
@endsection