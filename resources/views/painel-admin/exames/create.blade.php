@extends('template.painel-admin')
@section('title', 'Inserir Tipos de Exames')
@section('content')
<h5 class="mb-4">CADASTRO DE TIPOS DE EXAMES</h5>
<hr>
<form method="POST" action="{{route('exames.insert')}}">
    @csrf

    <div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome do Exame</label>
                <input type="text" class="form-control" id="" name="nome_exame" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">CID</label>
                <input type="text" class="form-control" id="" name="cid">
            </div>
        </div>

        
    </div>

</p>
<button type="submit" class="btn btn-primary">Salvar</button>


</form>

 
@endsection
