@extends('template.painel-admin')
@section('title', 'Editar Empresas')
@section('content')
<h5 class="mb-4">EDIÇÃO DE EMPRESAS</h5>
<form method="POST" action="{{route('empresas.editar', $item)}}">
        @csrf
        @method('put')

        <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome da empresa</label>
                <input value="{{$item->nome}}" type="text" class="form-control" id="" name="nome" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">CNPJ</label>
                <input value="{{$item->CNPJ}}" type="text" class="form-control" id="cnpj" name="CNPJ" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">IE</label>
                <input value="{{$item->ie}}" type="text" class="form-control" id="" name="ie" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input value="{{$item->email}}" type="email" class="form-control" id="email" name="email" required>
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="exampleInputEmail1">Endereço</label>
                <input value="{{$item->endereco}}" type="text" class="form-control" id="endereco" name="endereco" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Telefone</label>
                <input value="{{$item->fone}}" type="text" class="form-control" id="fone" name="fone" required>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
            <label for="exampleInputEmail1">Cidade</label>
                <select class="form-control" name="fk_cidades_id">
                    <?php

                    use App\Models\localidade;

                    $tabela = localidade::all();

                    $cidade = localidade::where('id', '=', $item->fk_cidades_id)->first();
                    if ($item->cidade != '0') {
                        $cidade = $cidade->cidade;
                    } else {
                        $cidade = '0';
                    }
                    ?>
                    <?php if ($cidade != '0') { ?>
                        <option value='{{$item->fk_cidades_id}}'>{{$cidade}}</option>
                    <?php } ?>

                    <option value='0'>Selecione uma cidade</option>
                    @foreach($tabela as $val)
                    <?php if ($cidade != $val->cidade) { ?>
                        <option value='{{$val->id}}'>{{$val->cidade}}</option>
                    <?php } ?>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Responsável</label>
                <input value="{{$item->responsavel}}" type="text" class="form-control" id="responsavel" name="responsavel" required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Data de início</label>
                <input value="{{$item->data_inicio}}" type="date" class="form-control" id="data_inicio" name="data_inicio">
            </div>
        </div>

    </div>

    <p align="center">
        <input value="{{$item->CNPJ}}" type="hidden" class="form-control" name="oldCNPJ">
        <button type="submit" class="btn btn-primary">Salvar Edição</button>

</form>
@endsection
