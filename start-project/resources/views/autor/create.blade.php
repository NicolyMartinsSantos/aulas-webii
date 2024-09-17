@extends('templates.main')

@section('content')
<form action="{{route('autor.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label class="nome mt-3">Nome</label>
    <input type="nome" name="nome" class="form-control" />
    <label class="mt-3">Apelido</label>
    <input name="apelido" class="form-control mt-1">
    <label class="mt-3">nacionalidade</label>
    <input type="text" name="nacionalidade" class="form-control mt-1">
   
    <!-- <input type="file" name="foto" class="mt-2 form-control" accept=".jpg, .png"> -->
    <input type="submit" value="Salvar" class="btn btn-success mt-2">
</form>
@endsection