@extends('template.painel-admin')
@section('title', 'Inserir Funcionário')
@section('content')
<h5 class="mb-4">CADASTRO DE FUNCIONÁRIOS</h5>
<hr>
<form method="POST" action="{{route('funcionarios.insert')}}">
    @csrf

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
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
</div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">CPF</label>
                <input type="text" class="form-control" id="cpf" name="CPF" required>
            </div>
        </div>
</div>
  
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">PIS</label>
                <input type="text" class="form-control" id="pis" name="PIS" required>
            </div>
         </div>

            <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Data de admissão</label>
                <input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control" id="data_admissao" name="data_admissao">
                </div>
         </div>

         <div class="col-md-4">
         <div class="form-group">
                <label for="exampleInputEmail1">Função</label>
                <select required class="form-control" name="fk_funcao_id">
                    <?php

                use App\Models\funcoe;

                $tabela = funcoe::all();
                ?>

                    <option value=''>Selecionar o tipo de função</option>
                    @foreach($tabela as $item2)
                    <option value='{{$item2->id}}'>{{$item2->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>

</div>

        <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
    </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" required>
            </div>
        </div>

</div>

<div class="row">
        
    <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" required>
            </div>
        </div>

     <div class="col-md-3">
     <div class="form-group">
                <label for="exampleInputEmail1">Salário</label>
                <input type="Text" size:"12" min="0,01" class ="form-control" onKeyUp="mascaraMoeda(this, event)" value="" name="salario" required>

        </div>
    </div>
    <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Cidade</label>
                <select required class="form-control" name="fk_cidades_id">
                    <?php


                use App\Models\localidade;

                $tabela = localidade::all();
                ?>

                    <option value=''>Selecionar a cidade</option>
                    @foreach($tabela as $item2)
                    <option value='{{$item2->id}}'>{{$item2->cidade}}/{{$item2->estado}}</option>
                    @endforeach
                </select>
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
