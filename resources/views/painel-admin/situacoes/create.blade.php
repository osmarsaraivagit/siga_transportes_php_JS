@extends('template.painel-admin')
@section('title', 'Inserir Situações')
@section('content')
<h5 class="mb-4">CADASTRO DE TIPOS DE SITUAÇÕES</h5>
<hr>
<form method="POST" action="{{route('situacoes.insert')}}">
    @csrf

    <div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome da situação</label>
                <input type="text" class="form-control" id="" name="tipo_nome" required>
            </div>
        </div>
        
    </div>

</p>
<button type="submit" class="btn btn-primary">Salvar</button>


</form>

 
@endsection
