@extends('template.painel-admin')
@section('title', 'Inserir Veículo')
@section('content')
<h5 class="mb-4">CADASTRO DE VEÍCULOS</h5>
<hr>
<form method="POST" action="{{route('veiculos.insert')}}">
    @csrf

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Tipo de Veículo</label>
                <select required class="form-control" name="fk_tipo_veiculo_id">
                    <?php

                    use App\Models\tipos_veiculo;

                    $tabela = tipos_veiculo::all();
                    ?>

                    <option value=''>Selecionar o tipo de veículo</option>
                    @foreach($tabela as $item2)
                    <option value='{{$item2->id}}'>{{$item2->tip_de_veiculo}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Modelo</label>
                <input type="text" class="form-control" id="" name="modelo" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Placas</label>
                <input type="text" class="form-control" id="placas" name="text" required>
            </div>
        </div>

                <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Data de compra</label>
                <input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control" id="data_inicio" name="data_inicio">
            </div>
        </div>


    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Empresa</label>
                <select required class="form-control" name="fk_empresas_id">
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


        <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Frota</label>
                <select required class="form-control" name="fk_empresas_id">
                    <?php

                    use App\Models\frota;

                    $tabela = frota::all();
                    ?>

                    <option value=''>Selecionar a Frota</option>
                    @foreach($tabela as $item2)
                    <option value='{{$item2->id}}'>{{$item2->nome_frota}}</option>
                    @endforeach
                </select>
            </div>
        </div>



        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Tipo de Aquisição</label>
                <input type="text" class="form-control" id="tipo_aquisicao" name="tipo_aquisicao" required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Km inicial</label>
                <input type="number" class="form-control" id="km_inicial" name="km_inicial" required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Valor do bem</label>
                <input type="money" class="form-control" id="valor" name="valor" required>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Data de início</label>
                <input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control" id="data_inicio" name="data_inicio">
            </div>
        </div>



        <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Situação</label>
                <select required class="form-control" name="fk_situacoes_id">
                    <?php

                    use App\Models\situacoe;

                    $tabela = situacoe::all();
                    ?>

                    <option value=''>Situação atual</option>
                    @foreach($tabela as $item2)
                    <option value='{{$item2->id}}'>{{$item2->tipo_nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>



    </div>

    </p>
    <button type="submit" class="btn btn-primary">Salvar</button>


</form>


@endsection
