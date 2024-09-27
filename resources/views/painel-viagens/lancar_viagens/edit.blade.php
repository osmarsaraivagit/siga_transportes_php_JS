@extends('template.painel-viagens')
@section('title', 'Editar Lançamento de viagens')
@section('content')

<h5 class="mb-4">LANÇAMENTO DE VIAGENS</h5>
<hr>
<form method="POST" action="{{route('lancar_viagens.editar', $item)}}">
    @csrf
    @method('put')

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">CRTC</label>
                <input value="{{$item->crtc}}" type="text" maxlength="12" size="12" class="form-control" id="" name="crtc" required>
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Data da Viagem</label>
                <input value="{{$item->data}}" type="date" class="form-control" id="data" name="data">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Frota</label>
                <select required class="form-control" name="fk_frota_id">
                <?php

use App\Models\frota;

$tabela = frota::all();
$frota = frota::where('id', '=', $item->fk_frota_id)->first();
if ($item->frota != '0') {
    $frota = $frota->nome_frota;
} else {
    $frota = '0';
}
?>
                    <?php if ($frota != '0') {?>
                    <option value='{{$item->fk_frota_id}}'>{{$frota}}</option>
                <?php }?>


                <option value='0'>Selecione uma frota</option>
                @foreach($tabela as $val)
                <?php if ($frota != $val->nome_frota) {?>
                    <option value='{{$val->id}}'>{{$val->nome_frota}}</option>
                <?php }?>

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

$motorista = funcionario::where('id', '=', $item->fk_motorista_id)->first();
if ($item->motorista != '0') {
    $motorista = $motorista->nome;
} else {
    $motorista = '0';
}
?>
                        <?php if ($motorista != '0') {?>
                            <option value='{{$item->fk_funcionario_id}}'>{{$motorista}}</option>
                        <?php }?>
                        ?>

                        <option value='0'>Selecione um motorista</option>
                        @foreach($tabela as $val)
                        <?php if ($motorista != $val->motorista) {?>
                            <option value='{{$val->id}}'>{{$val->nome}}</option>
                        <?php }?>
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

$origem = localidade::where('id', '=', $item->fk_origem_id)->first();
if ($item->origem != '0') {
    $origem = $origem->cidade;
} else {
    $origem = '0';
}
?>
                <?php if ($origem != '0') {?>
                <option value='{{$item->fk_origem_id}}'>{{$origem}}</option>
                <?php }?>

                <option value='0'>Selecione uma origem</option>
                @foreach($tabela as $val)
                <?php if ($origem != $val->origem) {?>
                    <option value='{{$val->id}}'>{{$val->cidade}}</option>
                <?php }?>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Destino Viagem</label>
                <select required class="form-control" name="fk_destino_id">
                <?php

$tabela = localidade::all();
$destino = localidade::where('id', '=', $item->fk_destino_id)->first();
if ($item->destino != '0') {
    $destino = $destino->cidade;
} else {
    $destino = '0';
}
?>
                    <?php if ($destino != '0') {?>
                    <option value='{{$item->fk_destino_id}}'>{{$destino}}</option>
                <?php }?>

                <option value='0'>Selecione um destino</option>
                @foreach($tabela as $val)
                <?php if ($destino != $val->destino) {?>
                    <option value='{{$val->id}}'>{{$val->cidade}}</option>
                <?php }?>
                    @endforeach
                </select>
            </div>
        </div>
</div>

<div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="exampleInputEmail1">Qtde de Veículos</label>
                <input value="{{$item->qtdeveiculos}}" type="number" min='0' max = '20' class="form-control" id="qtdeveiculos" name="qtdeveiculos" required>
            </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label for="exampleInputEmail1">Empresa</label>
                <select required class="form-control" name="fk_empresas_id" >
                    <?php

use App\Models\empresa;
$tabela = empresa::all();

$empresa = empresa::where('id', '=', $item->fk_empresas_id)->first();
if ($item->empresa != '0') {
    $empresa = $empresa->nome;
} else {
    $empresa = '0';
}
?>
                <?php if ($empresa != '0') {?>
                    <option value='{{$item->fk_empresas_id}}'>{{$empresa}}</option>
                <?php }?>

                <option value='0'>Selecione uma empresa</option>
                @foreach($tabela as $val)
                <?php if ($empresa != $val->empresa) {?>
                    <option value='{{$val->id}}'>{{$val->nome}}</option>
                <?php }?>
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

$status = statu::where('id', '=', $item->fk_status_id)->first();
if ($item->status != '0') {
    $status = $status->nome;
} else {
    $status = '0';
}
?>
                <?php if ($status != '0') {?>
                    <option value='{{$item->fk_status_id}}'>{{$status}}</option>
                <?php }?>

                <option value='0'>Selecione uma status</option>
                @foreach($tabela as $val)
                <?php if ($status != $val->status) {?>
                    <option value='{{$val->id}}'>{{$val->nome}}</option>
                <?php }?>
                @endforeach

                </select>
    </div>

</div>

</div>
<div class="row">
<div class="col-md-10">
            <div class="form-group">
                <label for="exampleInputEmail1">Observações</label>
                <input value="{{$item->obs}}" type="text" class="form-control" id="" name="obs" >
            </div>
        </div>

</div>


    </p>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <input value="{{$item->crtc}}" type="hidden" class="form-control" name="oldcrtc">
    <button type="button" class="btn btn-secondary" onclick="window.location.href='{{route('lancar_viagens.index')}}'"/>Voltar</button>


</form>


@endsection
