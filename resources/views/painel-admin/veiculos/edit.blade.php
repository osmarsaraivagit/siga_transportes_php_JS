@extends('template.painel-admin')
@section('title', 'Editar Veiculos')
@section('content')
<h5 class="mb-4">EDIÇÃO DE VEICULOS</h5>
<form method="POST" action="{{route('veiculos.editar', $item)}}">
    @csrf
    @method('put')
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="exampleInputEmail1">Tipo de Veículo</label>
            <select required class="form-control" name="fk_tipo_veiculo_id">
                <?php

        use App\Models\tipos_veiculo;

        $tabela = tipos_veiculo::all();

        $tipo_veiculo = tipos_veiculo::where('id', '=', $item->fk_tipo_veiculo_id)->first();
                if ($item->tipo_veiculo != '0') {
                    $tipo_veiculo = $tipo_veiculo->tipo_de_veiculo;
                } else {
                    $tipo_veiculo = '0';
                }
                ?>
                <?php if ($tipo_veiculo != '0') { ?>
                    <option value='{{$item->fk_tipo_veiculo_id}}'>{{$tipo_veiculo}}</option>
                <?php } ?>


                <option value='0'>Selecionar o tipo de veículo</option>
                @foreach($tabela as $val)
                <?php if ($tipo_veiculo != $val->tipo_de_veiculo) { ?>
                <option value='{{$val->id}}'>{{$val->tipo_de_veiculo}}</option>
                <?php } ?>
                @endforeach

            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="exampleInputEmail1">Marca</label>
            <input value="{{$item->marca}}" type="text" class="form-control" id="marca" name="marca" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="exampleInputEmail1">Modelo</label>
            <input value="{{$item->modelo}}" type="text" class="form-control" id="modelo" name="modelo" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="exampleInputEmail1">Placas</label>
            <input value="{{$item->placas}}" type="text" class="form-control" id="placas" name="placas" required>
        </div>
    </div>

            <div class="col-md-4">
        <div class="form-group">
            <label for="exampleInputEmail1">Data de compra</label>
            <input value="{{$item->dataCompra}}" type="date" class="form-control" id="dataCompra" name="dataCompra">
        </div>
    </div>


    <div class="col-md-4">
        <div class="form-group">
            <label for="exampleInputEmail1">Km inicial</label>
            <input value="{{$item->km_inicial}}"type="number" class="form-control" id="km_inicial" name="km_inicial" required>
        </div>
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

                $empresa = empresa::where('id', '=', $item->fk_empresas_id)->first();
                if ($item->empresa != '0') {
                    $empresa = $empresa->nome;
                } else {
                    $empresa = '0';
                }
                ?>
                <?php if ($empresa != '0') { ?>
                    <option value='{{$item->fk_empresas_id}}'>{{$empresa}}</option>
                <?php } ?>


                <option value='0'>Selecione uma empresa</option>
                @foreach($tabela as $val)
                <?php if ($empresa != $val->empresa) { ?>
                    <option value='{{$val->id}}'>{{$val->nome}}</option>
                <?php } ?>
                @endforeach

            </select>
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
                <?php if ($frota != '0') { ?>
                    <option value='{{$item->fk_frota_id}}'>{{$frota}}</option>
                <?php } ?>


                <option value='0'>Selecione uma frota</option>
                @foreach($tabela as $val)
                <?php if ($frota != $val->nome_frota) { ?>
                    <option value='{{$val->id}}'>{{$val->nome_frota}}</option>
                <?php } ?>

                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="exampleInputEmail1">Valor do bem</label>
            <input value="{{$item->valor}}" type="Text" size:"12" min="0,01" class ="form-control" onKeyUp="mascaraMoeda(this, event)" value="" name="valor" required>

        </div>
    </div>



</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="exampleInputEmail1">Tipo de Aquisição</label>
            <input value="{{$item->tipo_aquisicao}}" type="text" class="form-control" id="tipo_aquisicao" name="tipo_aquisicao" required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="exampleInputEmail1">Data de início</label>
            <input value="{{$item->data_inicio}}" type="date" class="form-control" id="data_inicio" name="data_inicio">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="exampleInputEmail1">Situação</label>
            <select required class="form-control" name="fk_situacoes_id">
                <?php

                use App\Models\situacoe;

                $tabela = situacoe::all();

                $situacao = situacoe::where('id', '=', $item->fk_situacoes_id)->first();
                if ($item->tipo_nome != '0') {
                    $situacao = $situacao->tipo_nome;
                } else {
                    $situacao = '0';
                }
                ?>
                <?php if ($situacao != '0') { ?>
                    <option value='{{$item->fk_situacoes_id}}'>{{$situacao}}</option>
                <?php } ?>


                <option value='0'>Selecione uma situação</option>
                @foreach($tabela as $val)
                <?php if ($situacao != $val->tipo_nome) { ?>
                    <option value='{{$val->id}}'>{{$val->tipo_nome}}</option>
                <?php } ?>
                @endforeach
            </select>
        </div>
    </div>

</div>



    <p align="center">
        <input value="{{$item->placas}}" type="hidden" class="form-control" name="oldplacas">
        <button type="submit" class="btn btn-primary">Salvar Edição</button>

</form>
@endsection


<!--Moeda-->
<script>

String.prototype.reverse = function(){
return this.split('').reverse().join('');
};

function mascaraMoeda(campo,evento){
var tecla = (!evento) ? window.event.keyCode : evento.which;
var valor  =  campo.value.replace(/[^\d]+/gi,'').reverse();
var resultado  = "";
var mascara = "#.###.###.###,##".reverse();
for (var x=0, y=0; x<mascara.length && y<valor.length;) {
  if (mascara.charAt(x) != '#') {
    resultado += mascara.charAt(x);
    x++;
  } else {
    resultado += valor.charAt(y);
    y++;
    x++;
  }
}
campo.value = resultado.reverse();
}


</script>
