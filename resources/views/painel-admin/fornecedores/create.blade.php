use App\Models\localidade;
@extends('template.painel-admin')
@section('title', 'Inserir Fornecedores')
@section('content')
<h5 class="mb-4">CADASTRO DE FORNECEDORES</h5>
<hr>
<form method="POST" action="{{route('fornecedores.insert')}}">
    @csrf

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" id="" name="nome" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">CNPJ</label>
                <input type="text" class="form-control" id="cnpj" name="CNPJ" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">IE</label>
                <input type="text" class="form-control" id="" name="ie" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="exampleInputEmail1">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Telefone</label>
                <input type="text" class="form-control" id="fone" name="fone" required>
            </div>
        </div>

       
    </div>

    <div class="row">
     

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Resposável</label>
                <input type="text" class="form-control" id="" name="responsavel" required>
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="exampleInputEmail1">Cidade</label>
                <select required class="form-control" name="fk_cidades_id">
                    <?php

                    use App\Models\localidade;

                    $tabela = localidade::all();
                    ?>

                    <option value=''>Selecionar Cidade</option>
                    @foreach($tabela as $item2)
                    <option value='{{$item2->id}}'>{{$item2->cidade}}/{{$item2->estado}}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Data de cadastro</label>
                <input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control" id="data_cadastro" name="data_cadastro">
            </div>
        </div>


    </div>

    </p>
    <button type="submit" class="btn btn-primary">Salvar</button>


</form>


@endsection
