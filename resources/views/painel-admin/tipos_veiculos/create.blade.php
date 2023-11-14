@extends('template.painel-admin')
@section('title', 'Inserir Tipo de Veículo')
@section('content')
<h5 class="mb-4">CADASTRO DE TIPOS DE VEÍCULOS</h5>
<hr>
<form method="POST" action="{{route('tipos-veiculos.insert')}}">
    @csrf

    <div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Tipo de veículo</label>
                <input type="text" class="form-control" id="" name="tipo_de_veiculo" required>
            </div>
        </div>
        
    </div>

</p>
<button type="submit" class="btn btn-primary">Salvar</button>


</form>

 
@endsection
