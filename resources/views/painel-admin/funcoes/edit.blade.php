@extends('template.painel-admin')
@section('title', 'Editar Funções')
@section('content')
<h5 class="mb-4">EDIÇÃO DE FUNÇOES </h5>
<form method="POST" action="{{route('funcoes.editar', $item)}}">
        @csrf
        @method('put')
        <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome da Função</label>
                <input type="text" value="{{$item->nome}}"class="form-control" id="" name="nome" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Código da função CBO</label>
                <input type="text" value="{{$item->codigo}}"lass="form-control" id="" name="codigo" required>
            </div>
        </div>

    </div>

    <p align="center">
        <input value="{{$item->nome}}" type="hidden" class="form-control" name="oldnome">
        <button type="submit" class="btn btn-primary">Salvar Edição</button>

</form>
@endsection
