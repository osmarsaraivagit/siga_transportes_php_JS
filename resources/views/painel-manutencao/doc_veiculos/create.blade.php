use App\Models\doc_veiculo;
@extends('template.painel-manutencao')
@section('title', 'Inserir Documentos Veiculos')
@section('content')
<h5 class="mb-4">CADASTRO DE DOCUMENTOS VEÍCULOS</h5>
<hr>
<form method="POST" action="{{route('doc_veiculos.insert')}}">
    @csrf

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome do documento</label>
                <input type="text" class="form-control" id="" name="nome" required>
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Data da realização</label>
                <input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control" id="data_cadastro" name="data_cadastro">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Data do vencimento</label>
                <input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control" id="data_cadastro" name="data_cadastro">
            </div>
        </div>


    </div>

    </p>
    <button type="submit" class="btn btn-primary">Salvar</button>


</form>


@endsection
