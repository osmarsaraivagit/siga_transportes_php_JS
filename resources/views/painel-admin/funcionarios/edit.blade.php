@extends('template.painel-admin')
@section('title', 'Editar Funcionários')
@section('content')
<h5 class="mb-4">EDIÇÃO DE FUNCIONÁRIOS</h5>
<form method="POST" action="{{route('funcionarios.editar', $item)}}">
    @csrf
    @method('put')

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" value="{{$item->nome}}" class="form-control" id="nome" name="nome" required>
            </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <label for="exampleInputEmail1">Empresa</label>
            <select required class="form-control" name="fk_empresa_id">
                <?php

                use App\Models\empresa;

                $tabela = empresa::all();

                $empresa = empresa::where('id', '=', $item->fk_empresa_id)->first();
                if ($item->empresa != '0') {
                    $empresa = $empresa->nome;
                } else {
                    $empresa = '0';
                }
                ?>
                <?php if ($empresa != '0') { ?>
                    <option value='{{$item->fk_empresa_id}}'>{{$empresa}}</option>
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
                <label for="exampleInputEmail1">CPF</label>
                <input type="text" value="{{$item->CPF}}" class="form-control" id="cpf" name="CPF" required>
            </div>
        </div>
</div>
  
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">PIS</label>
                <input type="text" value="{{$item->PIS}}" class="form-control" id="pis" name="PIS" required>
            </div>
         </div>

            <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Data de admissão</label>
                <input value="{{$item->data_admissao}}" type="date" class="form-control" id="data_admissao" name="data_admissao">
                </div>
         </div>

         <div class="col-md-4">
         <div class="form-group">
                <label for="exampleInputEmail1">Função</label>
                <select required class="form-control" name="fk_funcao_id">
                    <?php

                use App\Models\funcoe;

                $tabela = funcoe::all();
                
                $funcao = funcoe::where('id', '=', $item->fk_funcao_id)->first();
                if ($item->funcao != '0') {
                    $funcao = $funcao->nome;
                } else {
                    $funcao = '0';
                }
                ?>
                <?php if ($funcao != '0') { ?>
                    <option value='{{$item->fk_funcao_id}}'>{{$funcao}}</option>
                <?php } ?>


                <option value='0'>Selecione uma função</option>
                @foreach($tabela as $val)
                <?php if ($funcao != $val->funcao) { ?>
                    <option value='{{$val->id}}'>{{$val->nome}}</option>
                <?php } ?>

                    @endforeach
                </select>
            </div>
        </div>

</div>

        <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" value="{{$item->email}}" class="form-control" id="email" name="email" required>
            </div>
    </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Endereço</label>
                <input type="text" value="{{$item->endereco}}" class="form-control" id="endereco" name="endereco" required>
            </div>
        </div>

</div>

<div class="row">
        
    <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">telefone</label>
                <input type="text" value="{{$item->telefone}}" class="form-control" id="telefone" name="telefone" required>
            </div>
        </div>

     <div class="col-md-3">
     <div class="form-group">
                <label for="exampleInputEmail1">Salário</label>
                <input type="Text" value="{{$item->salario}}" size:"12" min="0,01" class ="form-control" onKeyUp="mascaraMoeda(this, event)" value="" name="salario" required>

        </div>
    </div>
    <div class="col-md-3">
            <div class="form-group">
            <label for="exampleInputEmail1">Cidade</label>
                <select class="form-control" name="fk_cidades_id">
                <?php
                    use App\Models\localidade;
                    $tabela = localidade::all();

                    $cidade = localidade::where('id', '=', $item->fk_cidades_id)->first();
                    if ($item->cidade != '0') {
                        $cidade = $cidade->cidade;
                    }else{
                    $cidade = '0';
                    }
                    ?>
                    <?php if($cidade != '0'){ ?>
                    <option value='{{$item->fk_cidades_id}}' >{{$cidade}}</option>
                    <?php } ?>

                    <option value='0' >Selecione uma cidade</option>
                    @foreach($tabela as $val)
                    <?php if($cidade != $val->cidade){ ?>
                    <option value='{{$val->id}}' >{{$val->cidade}}</option>
                    <?php } ?>
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
        <input value="{{$item->cpf}}" type="hidden" class="form-control" name="oldcpf">
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
