@extends('template.painel-admin')
@section('title', 'Editar Frotas')
@section('content')
<h5 class="mb-4">EDIÇÃO DE FROTAS </h5>
<form method="POST" action="{{route('frotas.editar', $item)}}">
        @csrf
        @method('put')
        <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome da Frota</label>
                <input type="text" value="{{$item->nome_frota}}"class="form-control" id="" name="nome_frota" required>
            </div>
        </div>

        <div class="col-md-6">
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

        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Situação</label>
                <select required class="form-control" name="fk_situacoes_id" >
                    <?php

                    use App\Models\situacoe;

                    $tabela = situacoe::all();

                    $situacao = situacoe::where('id', '=', $item->fk_situacoes_id)->first();
                    if ($item->situacao != '0') {
                        $situacao = $situacao->tipo_nome;
                    } else {
                        $situacao = '0';
                    }
                    ?>
                    <?php if ($situacao != '0') { ?>
                        <option value='{{$item->fk_situacoes_id}}'>{{$situacao}}</option>
                    <?php } ?>

                    <option value='0'>Selecione uma situação/status</option>
                    @foreach($tabela as $val)
                    <?php if ($situacao != $val->situacao) { ?>
                        <option value='{{$val->id}}'>{{$val->tipo_nome}}</option>
                    <?php } ?>
                    @endforeach
                </select>

            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Data de cadastro</label>
                <input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control" id="data_cadastro" name="data_cadastro">
            </div>
        </div>

    </div>

    </div>

    <p align="center">
        <input value="{{$item->CNPJ}}" type="hidden" class="form-control" name="oldCNPJ">
        <button type="submit" class="btn btn-primary">Salvar Edição</button>

</form>
@endsection
