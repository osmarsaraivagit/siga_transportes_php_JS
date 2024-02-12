@extends('template.painel-admin')
@section('title', 'Inserir Localidades')
@section('content')
<h5 class="mb-4">CADASTRO DE LOCALIDADES</h5>
<hr>
<form method="POST" action="{{route('localidades.insert')}}">
    @csrf

    <div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Cidade</label>
                <input type="text" class="form-control" id="" name="cidade" required>
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label for="exampleInputEmail1">Estado</label>
                <input type="text" maxlength=2 class="form-control" id="" name="estado" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">País</label>
                <input type="text" class="form-control" id="" name="pais" required>
            </div>
        </div>
        
    </div>

</p>
<button type="submit" class="btn btn-primary">Salvar</button>


</form>

 
@endsection
