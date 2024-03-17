@extends('template.painel-admin')
@section('title', 'Inserir Funçoes')
@section('content')
<h5 class="mb-4">CADASTRO DE FUNÇOES</h5>
<hr>
<form method="POST" action="{{route('funcoes.insert')}}">
    @csrf

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome da Função</label>
                <input type="text" class="form-control" id="" name="nome" required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Código da função CBO</label>
                <input type="text" class="form-control" id="" name="codigo" required>
            </div>
        </div>

    </div>

    </p>
    <button type="submit" class="btn btn-primary">Salvar</button>


</form>


@endsection
