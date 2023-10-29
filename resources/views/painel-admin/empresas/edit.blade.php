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
                <label for="exampleInputEmail1">Nome</label>
                <input value="{{$item->nome}}" type="text" class="form-control" id="" name="nome" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">CNPJ</label>
                <input value="{{$item->CNPJ}}" type="text" class="form-control" id="" name="CNPJ">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">IE</label>
                <input value="{{$item->ie}}" type="text" class="form-control" id="" name="ie">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input value="{{$item->email}}" type="email" class="form-control" id="" name="email">
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="exampleInputEmail1">Endereço</label>
                <input value="{{$item->endereco}}" type="text" class="form-control" id="" name="endereco">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Telefone</label>
                <input value="{{$item->telefone}}" type="text" class="form-control" id="" name="telefone">
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Cidade</label>
                <select class="form-control" name="fk_cidades_id">
                <?php
                    use App\Models\localidade;
                    $tabela = localidade::all();

                    $cidade = localidade::where('id', '=', $item->fk_cidades_id)->first();
                    if ($item->cidade != '0') {
                        $cidade = $cidade->cidade;
                    }else{
                    $cidade = '0';
                    }
                    ?>
                    <?php if($cidade != '0'){ ?>
                    <option value='{{$item->fk_cidades_id}}' >{{$cidade}}</option>
                    <?php } ?>

                    <option value='0' >Selecione uma cidade</option>
                    @foreach($tabela as $val)
                    <?php if($cidade != $val->cidade){ ?>
                    <option value='{{$val->id}}' >{{$val->cidade}}</option>
                    <?php } ?>
                    @endforeach
            </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Data de cadastro</label>
                <input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control" id="" name="data_cadastro">
            </div>
        </div>

    </div>

    <p align="center">
        <input value="{{$item->CNPJ}}" type="hidden" class="form-control" name="oldCNPJ">
        <button type="submit" class="btn btn-primary">Salvar Edição</button>

</form>
@endsection
