@extends('templates.main')

@section('content')
<form action="{{route('livro.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label class="titulo mt-3">titulo</label>
    <input type="titulo" name="titulo" class="form-control" />
    <label class="mt-3">description</label>
    <input name="description" class="form-control mt-1">
   
    <!-- <input type="file" name="foto" class="mt-2 form-control" accept=".jpg, .png"> -->
    <input type="submit" value="Salvar" class="btn btn-success mt-2">
</form>
@endsection

