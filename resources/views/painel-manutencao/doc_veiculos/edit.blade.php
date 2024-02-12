use App\Models\doc_veiculo;
@extends('template.painel-manutencao')
@section('title', 'Editar Documentos de Veiculos')
@section('content')
<h5 class="mb-4">EDIÇÃO DE Documentos de Veículos</h5>
<form method="POST" action="{{route('doc_veiculos.editar', $item)}}">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input value="{{$item->nome_doc}}" type="text" class="form-control" id="" name="nome_doc" required>
            </div>
        </div>
       
        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Data da realização</label>
                <input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control" id="" name="data_realizado">
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Data do vencimento</label>
                <input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control" id="" name="data_vencimento">
            </div>
        </div>

    </div>

    <p align="center">
        <input value="{{$item->CNPJ}}" type="hidden" class="form-control" name="oldCNPJ">
        <button type="submit" class="btn btn-primary">Salvar Edição</button>

</form>
@endsection
