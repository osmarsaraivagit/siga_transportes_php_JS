@extends('template.painel-admin')
@section('title', 'Editar Tipos de Exames')
@section('content')
<h5 class="mb-4">EDIÇÃO DE TIPOS DE EXAMES</h5>
<form method="POST" action="{{route('exames.editar', $item)}}">
    @csrf
    @method('put')
    <div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome do Exame</label>
                <input value="{{$item->nome_exame}}" type="text" class="form-control" id="" name="nome_exame" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">CID</label>
                <input value="{{$item->cid}}" type="text" class="form-control" id="" name="cid" required>
            </div>
        </div>


    </div>
    <input value="{{$item->nome_exame}}" type="hidden" class="form-control" name="oldnome_exame">
    <button type="submit" class="btn btn-primary">Salvar Edição</button>
    </p>
</form>
@endsection