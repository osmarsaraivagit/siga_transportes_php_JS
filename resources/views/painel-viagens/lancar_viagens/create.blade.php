
@extends('template.painel-viagens')
@section('title', 'lançar Viagens')
@section('content')


<h5 class="mb-4">LANÇAMENTO DE VIAGENS</h5>
<hr>
<form method="POST" action="{{route('lancar_viagens.insert')}}">
    @csrf


    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">CRTC</label>
                <input type="text" maxlength="12" size="12" class="form-control" id="" name="crtc" required>
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Data da Viagem</label>
                <input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control" id="data" name="data">
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
</div>

<div class="row">
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

        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Origem Viagem</label>
                <select required class="form-control" name="fk_origem_id">
                    <?php

use App\Models\localidade;
$tabela = localidade::all();
?>

                    <option value=''>Selecionar a Origem</option>
                    @foreach($tabela as $item2)
                    <option value='{{$item2->id}}'>{{$item2->cidade}}>{{$item2->estado}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-3">
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
</div>

<div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="exampleInputEmail1">Qtde de Veículos</label>
                <input type="number" min='0' max = '20' class="form-control" id="qtdeveiculos" name="qtdeveiculos" required>
            </div>
        </div>

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
        <div class="col-md-4">
        <div class="form-group">
        <label for="exampleInputEmail1">Status</label>
        <select required class="form-control" name="fk_status_id" >
                    <?php

                    use App\Models\statu;

                    $tabela = statu::all();
                    ?>
                    
                    <option value=''>Selecione o Status</option>
                    @foreach($tabela as $item2)
                    <option value='{{$item2->id}}'>{{$item2->nome}}</option>
                    @endforeach
                </select>
    </div>

</div>

</div>
<div class="row">
<div class="col-md-10">
            <div class="form-group">
                <label for="exampleInputEmail1">Observações</label>
                <textarea class="form-control" id="obs" name="obs" >
            </div>
        </div>

</div>


    </p>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <button type="button" class="btn btn-secondary" onclick="window.location.href='{{route('lancar_viagens.index')}}'"/>Voltar</button>


</form>


@endsection
