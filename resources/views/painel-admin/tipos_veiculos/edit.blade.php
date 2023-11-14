@extends('template.painel-admin')
@section('title', 'Editar Tipos de Veiculos')
@section('content')
<h5 class="mb-4">EDIÇÃO DE TIPOS DE VEÍCULOS</h5>
<form method="POST" action="{{route('tipos-veiculos.editar', $item)}}">
    @csrf
    @method('put')
    <div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Tipo de veículo</label>
                <input value="{{$item->tipo_de_veiculo}}" type="text" class="form-control" id="" name="tipo_de_veiculo" required>
            </div>
        </div>


    </div>
    <input value="{{$item->tipo_de_veiculo}}" type="hidden" class="form-control" name="oldtipo_de_veiculo">
    <button type="submit" class="btn btn-primary">Salvar Edição</button>
    </p>
</form>
@endsection