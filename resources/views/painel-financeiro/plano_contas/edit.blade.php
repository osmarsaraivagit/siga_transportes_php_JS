@extends('template.painel-financeiro')
@section('title', 'Atualizar Saldo Plano de Contas')
@section('content')
<h5 class="mb-4">ATUALIZAR SALDO PLANO DE CONTAS</h5>
<hr>

<form method="GET" action="{{route('plano_contas.index')}}">
    <button type="submit" class="btn btn-secondary">Voltar</button>
</form>

<form method="POST" action="{{route('plano_contas.editar', $item)}}">
    @csrf
    @method('put')

    <div class="row">
    <div class="col-md-2">
            <div class="form-group">
            <label disabled for="exampleInputEmail1">Tipo</label>
            <select required  hidden class="form-control" name="tipo">

            <?php

use App\Models\plano_conta;

$tabela = plano_conta::all();

$tipo = plano_conta::where('tipo', '=', $item->tipo)->first();
if ($item->tipo != '0') {
    $tipo = $tipo->tipo;
} else {
    $tipo = '0';
}
?>
                        <?php if ($tipo != '0') {?>
                            <option value='{{$item->tipo}}'>{{$tipo}}</option>
                        <?php }?>
                        @foreach($tabela as $val)
                        <?php if ($tipo != $val->tipo) {?>
                            <option value='{{$val->id}}'>{{$val->tipo}}</option>
                        <?php }?>
                        @endforeach
                        </select>

                        <input type="text" readonly value="{{$item->tipo}}" class="form-control" id="" name="tipo"  required>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="exampleInputEmail1">Conta</label>
                <input type="number" readonly value="{{$item->conta}}" class="form-control" id="" name="conta" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Descrição</label>
                <input type="text" readonly value="{{$item->descricao}}" class="form-control" id="" name="descricao"  required>

            </div>
         </div>
</div>


<div class="row">
        <div class="col-md-3">
            <div class="form-group">
            <label for="exampleInputEmail1">Sigla (D/Débito || C/Crédito)</label>
            <select required  hidden ="form-control" name="sigla_situacao" >

            <?php

$tabela = plano_conta::all();

$sigla_situacao = plano_conta::where('sigla_situacao', '=', $item->sigla_situacao)->first();
if ($sigla_situacao->sigla_situacao != '0') {
    $sigla_situacao = $sigla_situacao->sigla_situacao;
} else {
    $sigla_situacao = '0';
}
?>
                        <?php if ($sigla_situacao != '0') {?>
                            <option value='{{$item->sigla_situacao}}'>{{$sigla_situacao}}</option>
                        <?php }?>

                        @foreach($tabela as $val)
                        <?php if ($sigla_situacao != $val->sigla_situacao) {?>
                            <option value='{{$val->id}}'>{{$val->sigla_situacao}}</option>
                        <?php }?>
                        @endforeach
                        </select>

                        <input type="text" readonly value="{{$item->sigla_situacao}}" class="form-control" id="" name="sigla_situacao"  required>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group" >
                <label for="exampleInputEmail1">$ Saldo Inicial</label>
                <input  class=”text-info” value="{{$item->saldo}}" size:"12" min="0,01" class ="form-control" onKeyUp="mascaraMoeda(this, event)" value="" name="saldo" required>
            </div>
        </div>

</div>


    </p>
    <input value="{{$item->conta}}" type="hidden" class="form-control" name="oldconta">
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


<script>
select[readonly] {
  background: #eee;
  pointer-events: none;
  touch-action: none;
}
</script>
