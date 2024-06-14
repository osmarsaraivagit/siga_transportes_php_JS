@extends('template.painel-financeiro')
@section('title', 'Inserir Plano de Contas')
@section('content')
<h5 class="mb-4">CADASTRO DE PLANO DE CONTAS</h5>
<hr>

<form method="GET" action="{{route('plano_contas.index')}}">
    @csrf
    <button type="submit" class="btn btn-secondary">Voltar</button>
</form>

<form method="POST" action="{{route('plano_contas.insert')}}">
    @csrf
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
            <label for="exampleInputEmail1">Tipo</label>
            <select required class="form-control" name="tipo" >
                    <option>1-ATIVO</option>
                    <option>2-PASSIVO</option>
                    <option>3-DESPESAS</option>
                    <option>4-RECEITAS</option>
            </select>
            </div>
        </div>
    
        <div class="col-md-2">
            <div class="form-group">
                <label for="exampleInputEmail1">Conta</label>
                <input type="number"  class="form-control" id="" name="conta" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Descrição</label>
                <input type="text" class="form-control" id="" name="descricao"  required>
            </div>
 
        </div>
</div>

        <div class="row">

        <div class="col-md-3">
            <div class="form-group">

            <label for="exampleInputEmail1">Sigla (D/Débito || C/Crédito)</label>
            <select required class="form-control" name="sigla_situacao" >
                    <option>D</option>
                    <option>C</option>
            </select>

            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">$ Saldo</label>
                <input type="Text" size:"12" min="0,01" class ="form-control" onKeyUp="mascaraMoeda(this, event)" value="" name="saldo" required>
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
