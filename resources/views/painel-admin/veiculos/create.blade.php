@extends('template.painel-admin')
@section('title', 'Inserir Veiculo')
@section('content')
<h5 class="mb-4">CADASTRO DE VEICULOS</h5>
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
                    <option value='{{$item2->id}}'>{{$item2->tipo_de_veiculo}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Marca/Fabricante</label>
                <input type="text" class="form-control" id="marca" name="marca" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Ano Modelo</label>
                <input type="number" class="form-control" min="1950" max="2099" name="ano_modelo" placeholder="Formato: AAAA" data-mask="0000" maxlength="4" autocomplete="off"  required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Ano Fabricação</label>
                <input type="number" class="form-control" min="1950" max="2099" placeholder="Formato: AAAA" data-mask="0000" maxlength="4" autocomplete="off"  name="ano_fabricacao"  required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">RENAVAM</label>
                <input type="text" class="form-control" name="renavam"  placeholder="Formato: AAAAAAAAAAA" data-mask="00000000000" maxlength="11" autocomplete="off"   required>
            </div>
        </div>
</div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Placas</label>
                <input type="text" class="form-control cep-mask" name="placas"  placeholder="Formato: XXX-1X11" maxlength="8" autocomplete="off"  required>
            </div>
        </div>

                <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Data de compra</label>
                <input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control" id="dataCompra" name="dataCompra">
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Km inicial</label>
                <input type="text" class="form-control"  placeholder="Formato: 0000000000000" data-mask="000000000000" maxlength="12" autocomplete="off"  name="km_inicial"  required>
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
                <label for="exampleInputEmail1">Valor do bem</label>
                <input type="Text" size:"12" min="0,01" class ="form-control" onKeyUp="mascaraMoeda(this, event)" value="" name="valor" required>

            </div>
        </div>



</div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Tipo de Aquisição</label>
                <input type="text" class="form-control" id="tipo_aquisicao" name="tipo_aquisicao" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Data de início/Emplacamento</label>
                <input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control" id="data_inicio" name="data_emplacamento">
            </div>
        </div>

        <div class="col-md-3">
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

        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Observação</label>
                <input value="" type="text" class="form-control" id="" name="obs">
            </div>
        </div>

</div>

    </p>
    <button type="submit" class="btn btn-primary">Salvar</button>


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


