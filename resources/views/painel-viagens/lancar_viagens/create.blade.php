
@extends('template.painel-viagens')
@section('title', 'lançar Viagens')
@section('content')

<h5 class="mb-4">CADASTRO DE VIAGENS</h5>
<hr>
<form method="POST" action="{{route('lancar_viagens.insert')}}">
    @csrf

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">CRTC</label>
                <input type="text" class="form-control" id="" name="nome" required>
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Data da Viagem</label>
                <input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control" id="data_cadastro" name="data_cadastro">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Frota</label>
                <select required class="form-control" name="fk_frota_id">
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
                <label for="exampleInputEmail1">Motorista</label>
                <select required class="form-control" name="fk_motorista_id">
                    <?php


                use App\Models\funcionario;


                $tabela = funcionario::all();
                ?>

                    <option value=''>Selecionar o motorista</option>
                    @foreach($tabela as $item2)
                    <option value='{{$item2->id}}'>{{$item2->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Origem Viagem</label>
                <select required class="form-control" name="fk_origem_id">
                    <?php

                use App\Models\localidade;
                $tabela = localidade::all();
                ?>

                    <option value=''>Selecionar a Origem</option>
                    @foreach($tabela as $item4)
                    <option value='{{$item2->id}}'>{{$item2->cidade}}>{{$item2->estado}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Destino Viagem</label>
                <select required class="form-control" name="fk_destino_id">
                    <?php

                    ?>

                    <option value=''>Selecionar a Destino</option>
                    @foreach($tabela as $item2)
                    <option value='{{$item2->id}}'>{{$item2->cidade}}>{{$item2->estado}}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Data do vencimento</label>
                <input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control" id="data_cadastro" name="data_cadastro">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">km Inicial</label>
                <input type="number" class="form-control" id="" name="kmInicial" required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">km Final</label>
                <input type="number" class="form-control" id="" name="kmFinal" required>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">km Total</label>
                <input type="number" class="form-control" id="" name="kmTotal" required>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Litragem</label>
                <input type="number" class="form-control" id="" name="litragem" required>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Qtde de Veículos</label>
                <input type="number" class="form-control" id="" name="qtdveiculos" required>
            </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label for="exampleInputEmail1">Empresa</label>
                <select required class="form-control" name="fk_empresa_id">
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

            <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Observações</label>
                <input type="text" class="form-control" id="" name="obs" required>
            </div>
        </div>

</div>


    </div>

    </p>
    <button type="submit" class="btn btn-primary">Salvar</button>


</form>


@endsection
