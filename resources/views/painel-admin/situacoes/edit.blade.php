@extends('template.painel-admin')
@section('title', 'Editar Situações')
@section('content')
<h5 class="mb-4">EDIÇÃO DE TIPOS DE SITUAÇÕES</h5>
<form method="POST" action="{{route('situacoes.editar', $item)}}">
    @csrf
    @method('put')
    <div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome da Situação</label>
                <input value="{{$item->tipo_nome}}" type="text" class="form-control" id="" name="tipo_nome" required>
            </div>
        </div>


    </div>
    <input value="{{$item->tipo_nome}}" type="hidden" class="form-control" name="oldtipo_nome">
    <button type="submit" class="btn btn-primary">Salvar Edição</button>
    </p>
</form>
@endsection
