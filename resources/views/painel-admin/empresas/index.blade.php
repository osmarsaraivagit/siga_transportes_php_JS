@extends('template.painel-admin')
@section('title', 'Empresas')
@section('content')
<?php


use App\Models\localidade;

@session_start();
if (@$_SESSION['id_usuario'] == null) {
    echo "<script language='javascript'> window.location='./' </script>";
}
if (!isset($id)) {
    $id = "";
}

?>


<a href="{{route('empresas.inserir')}}" type="button" class="mt-4 mb-4 btn btn-primary">Inserir Empresa</a>

<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CNPJ</th>
                        <th>Email</th>

                        <th>Cidade</th>
                        <th>Responsável</th>
                        <th>Data de início</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($itens as $item)
                    <?php
                    $data = implode('/', array_reverse(explode('-', $item->data_inicio)));
                    $cidade = localidade::where('id', '=', $item->fk_cidades_id)->first();
                    if ($item->cidade != '0') {
                        $cidade = $cidade->cidade;
                    } else {
                        $cidade = 'Nenhuma cidade';
                    }

                    ?>
                    <tr>
                        <td>{{$item->nome}}</td>
                        <td>{{$item->CNPJ}}</td>
                        <td>{{$item->email}}</td>

                        <td>{{$cidade}}</td>
                        <td>{{$item->responsavel}}</td>
                        <td>{{$data}}</td>

                        <td>
                            <a title="Editar o registro" href="{{route('empresas.edit', $item)}}"><i class="fas fa-edit text-info mr-1"></i></a>
                            <a title="Excluir o registro" href="{{route('empresas.modal', $item)}}"><i class="fas fa-trash text-danger mr-1"></i></a>
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
                <form method="POST" action="{{route('empresas.delete', $id)}}">
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
