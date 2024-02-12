@extends('template.painel-admin')
@section('title', 'Editar Documentos')
@section('content')
<h5 class="mb-4">EDIÇÃO DE TIPOS DE DOCUMENTOS</h5>
<form method="POST" action="{{route('documentos.editar', $item)}}">
    @csrf
    @method('put')
    <div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome do documento</label>
                <input value="{{$item->nome_doc}}" type="text" class="form-control" id="" name="nome_doc" required>
            </div>
        </div>


    </div>
    <input value="{{$item->nome_doc}}" type="hidden" class="form-control" name="oldnome_doc">
    <button type="submit" class="btn btn-primary">Salvar Edição</button>
    </p>
</form>
@endsection