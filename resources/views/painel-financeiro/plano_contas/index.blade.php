@extends('template.painel-financeiro')
@section('title', 'Plano de Contas')
@section('content')
<?php

@session_start();
if (@$_SESSION['id_usuario'] == null) {
    echo "<script language='javascript'> window.location='./' </script>";
}
if (!isset($id)) {
    $id = "";
}

?>


    <a href="{{route('plano_contas.inserir')}}" type="button" class="mt-4 mb-4 btn btn-primary">Construir Plano de Contas</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>Conta</th>
                            <th>Descrição</th>
                            <th>Sigla (D/C)</th>
                            <th>Saldo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($itens as $item)
                    <?php
$num = $item->saldo;
$br_format_number = number_format($num, 2, ',', '.');
?>
                        <tr>
                            <td>{{$item->tipo}}</td>
                            <td>{{$item->conta}}</td>
                            <td>{{$item->descricao}}</td>
                            <td>{{$item->sigla_situacao}}</td>
                            <td align="right">R$ {{$br_format_number}}</td>


                            <td>

                                <a title="Editar o registro" href="{{route('plano_contas.modal', $item)}}"><i class="fas fa-trash text-danger mr-1"></i></a>
                                <a title="Excluir o registro" href="{{route('plano_contas.edit', $item)}}"><i class="fas fa-edit text-info mr-1"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Deletar Conta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseja Realmente Excluir esta Conta?

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form method="POST" action="{{route('plano_contas.delete', $id)}}">
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
