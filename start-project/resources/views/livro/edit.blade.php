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

    <a href="{{ route('livro.index') }}" class="btn btn-secondary mt-1">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-arrow-left-circle"
        viewBox="0 0 16 16">
        <path fill-rule="evenodd"
            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
    </svg>
</a>
</form>
@endsection