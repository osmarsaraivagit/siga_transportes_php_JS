@extends('template.painel-admin')
@section('title', 'Funcionários')
@section('content')
<?php

use App\Models\empresa;
use App\Models\funcoe;
use App\Models\localidade;
use App\Models\situacoe;

@session_start();
if (@$_SESSION['id_usuario'] == null) {
    echo "<script language='javascript'> window.location='./' </script>";
}
if (!isset($id)) {
    $id = "";
}

?>


<a href="{{route('funcionarios.inserir')}}" type="button" class="mt-4 mb-4 btn btn-primary">Inserir Funcionário</a>

<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Empresa</th>
                        <th>CPF</th>
                        <th>Data de admissão</th>
                        <th>Função</th>
                        <th>Telefone</th>
                        <th>Salário</th>
                        <th>Situação</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($itens as $item)
                    <?php
                    $data = implode('/', array_reverse(explode('-', $item->data_admissao)));
                   
                    $funcao= funcoe::where('id', '=', $item->fk_funcao_id)->first();
                    if ($item->funcao != '0') {
                        $funcao = $funcao->nome;
                    } else {
                        $fucnao = 'Nenhuma função';
                    }


                    $empresa = empresa::where('id', '=', $item->fk_empresa_id)->first();
                    if ($item->empresa != '0') {
                        $empresa = $empresa->nome;
                    } else {
                        $empresa = 'Nenhuma empresa';
                    }


                    $situacao = situacoe::where('id', '=', $item->fk_situacoes_id)->first();
                    if ($item->situacao != '0') {
                        $situacao = $situacao->tipo_nome;
                    } else {
                        $empresa = 'Nenhuma situação';
                    }

                    ?>
                    <?php    
                    $num = $item->salario;
                    $br_format_number = number_format($num,2,',','.');
                    ?>
                    <tr>

                        <td>{{$item->nome}}</td>
                        <td>{{$empresa}}</td>
                        <td>{{$item->CPF}}</td>     
                        <td>{{$data}}</td>
                        <td>{{$funcao}}</td>
                        <td>{{$item->telefone}}</td>
                        <td>R$ {{$br_format_number}}</td>
                        <td>{{$situacao}}</td>
                      
                    
                        <td>
                            <a href="{{route('funcionarios.edit', $item)}}"><i class="fas fa-edit text-info mr-1"></i></a>
                            <a href="{{route('funcionarios.modal', $item)}}"><i class="fas fa-trash text-danger mr-1"></i></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>





</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').dataTable({
            "ordering": false
        })

    });
</script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deletar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseja Realmente Excluir este Registro?

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form method="POST" action="{{route('funcionarios.delete', $id)}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Excluir</button>

                </form>

            </div>
        </div>
    </div>
</div>

<?php

if (@$id != "") {
    echo "<script>$('#exampleModal').modal('show');</script>";
}
?>
@endsection
