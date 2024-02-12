@extends('template.painel-admin')
@section('title', 'Editar Localidades')
@section('content')
<h5 class="mb-4">EDIÇÃO DE LOCALIDADES</h5>
<form method="POST" action="{{route('localidades.editar', $item)}}">
        @csrf
        @method('put')
        <div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Cidade</label>
                <input value="{{$item->cidade}}" type="text" class="form-control" id="" name="cidade" required>
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label for="exampleInputEmail1">Estado</label>
                <input value="{{$item->estado}}" type="text" maxlength=2 class="form-control" id="" name="estado" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">País</label>
                <input value="{{$item->pais}}" type="text" class="form-control" id="" name="pais" required>
            </div>
        </div>
        
    </div>
        <input value="{{$item->cidade}}" type="hidden" class="form-control" name="oldcidade" >
        <button type="submit" class="btn btn-primary">Salvar Edição</button>
        </p>
    </form>
@endsection