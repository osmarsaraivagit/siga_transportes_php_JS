@extends('template.painel-admin')
@section('title', 'Frotas')
@section('content')
<?php


use App\Models\empresa;
use App\Models\situacoe;
use App\Models\localidade;

@session_start();
if (@$_SESSION['id_usuario'] == null) {
    echo "<script language='javascript'> window.location='./' </script>";
}
if (!isset($id)) {
    $id = "";
}

?>


    <a href="{{route('frotas.inserir')}}" type="button" class="mt-4 mb-4 btn btn-primary">Inserir Frota</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nome Frota</th>
                            <th>Empresa</th>
                            <th>Situação</th>
                            <th>Data de cadastro</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($itens as $item)
                        <?php
                        $data = implode('/', array_reverse(explode('-', $item->data_cadastro)));
                        $empresa = empresa::where('id', '=', $item->fk_empresas_id)->first();
                        if ($item->empresa != '0') {
                            $empresa = $empresa->nome;
                        } else {
                            $empresa = 'Nenhuma empresa';
                        }
                        
                        $situacao = situacoe::where('id', '=', $item->fk_situacoes_id)->first();
                        if ($item->empresa != '0') {
                            $situacao = $situacao->tipo_nome;
                        } else {
                            $empresa = 'Nenhuma empresa';
                        }

                        ?>
                        <tr>
                            <td>{{$item->nome_frota}}</td>
                            <td>{{$empresa}}</td>
                            <td>{{$situacao}}</td>
                            <td>{{$data}}</td>

                            <td>
                                <a href="{{route('frotas.edit', $item)}}"><i class="fas fa-edit text-info mr-1"></i></a>
                                <a href="{{route('frotas.modal', $item)}}"><i class="fas fa-trash text-danger mr-1"></i></a>
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
                <form method="POST" action="{{route('frotas.delete', $id)}}">
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
