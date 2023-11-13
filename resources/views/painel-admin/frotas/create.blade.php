@extends('template.painel-admin')
@section('title', 'Inserir Frotas')
@section('content')
<h5 class="mb-4">CADASTRO DE FROTAS</h5>
<hr>
<form method="POST" action="{{route('frotas.insert')}}">
    @csrf

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome da Frota</label>
                <input type="text" class="form-control" id="" name="nome_frota" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Empresa</label>
                <select required class="form-control" name="fk_empresas_id" >
                    <?php

                    use App\Models\empresa;

                    $tabela = empresa::all();
                    ?>
                    
                    <option value=''>Selecionar Empresa</option>
                    @foreach($tabela as $item2)
                    <option value='{{$item2->id}}'>{{$item2->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Situação</label>
                <select required class="form-control" name="fk_situacoes_id" >
                    <?php

                    use App\Models\situacoe;

                    $tabela = situacoe::all();
                    ?>
                    
                    <option value=''>Selecionar a situação</option>
                    @foreach($tabela as $item2)
                    <option value='{{$item2->id}}'>{{$item2->tipo_nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
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
