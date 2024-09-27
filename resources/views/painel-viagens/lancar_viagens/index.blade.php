@extends('template.painel-viagens')
@section('title', 'Lançar Viagens')
@section('content')
<?php
use App\Models\empresa;
use App\Models\frota;
use App\Models\localidade;
use App\Models\funcionario;

@session_start();
if (@$_SESSION['id_usuario'] == null) {
    echo "<script language='javascript'> window.location='./' </script>";
}
if (!isset($id)) {
    $id = "";
}

?>


<a href="{{route('lancar_viagens.inserir')}}" type="button" class="mt-4 mb-4 btn btn-primary">Lançar Viagem</a>

<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>CRTC</th>
                        <th>DATA</th>
                        <th>Frota</th>
                        <th>Motorista</th>
                        <th>Origem</th>
                        <th>Destino</th>
                        <th>Qtde de veículos</th>
                        <th>Status</th>

                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($itens as $item)
                    <?php
$data = implode('/', array_reverse(explode('-', $item->data)));

$empresa = empresa::where('id', '=', $item->fk_empresas_id)->first();
if ($item->empresa != '0') {
    $empresa = $empresa->nome;
} else {
    $empresa = 'Nenhuma empresa';
}

$origem = localidade::where('id', '=', $item->fk_origem_id)->first();
if ($item->origem != '0') {
    $origem = $origem->cidade;
} else {
    $origem = 'Nenhuma cidade';
}

$destino = localidade::where('id', '=', $item->fk_destino_id)->first();
if ($item->destino != '0') {
    $destino = $destino->cidade;
} else {
    $destino = 'Nenhuma cidade';
}

$frota = frota::where('id', '=', $item->fk_frota_id)->first();
if ($item->frota != '0') {
    $frota = $frota->nome_frota;
} else {
    $frota = 'Nenhuma Frota';
}

$motorista = funcionario::where('id', '=', $item->fk_motorista_id)->first();
if ($item->motorista != '0') {
    $motorista = $motorista->nome;
} else {
    $frota = 'Nenhum Motorista';
}

?>
                    <tr>
                        <td>{{$empresa}}</td>
                        <td>{{$item->crtc}}</td>
                        <td>{{$data}}</td>
                        <td>{{$frota}}</td>
                        <td>{{$motorista}}</td>
                        <td>{{$origem}}</td>
                        <td>{{$destino}}</td>
                        <td>{{$item->qtdeveiculos}}</td>

                        @if ($item->fk_status_id == 1)
                        <td><span class="badge badge-pill badge-success mb-1">Paralisada/Descando</span></td>

                        @elseif ($item->fk_status_id  == 2)
                        <td><span class="badge badge-info">Acertada</span></td>

                        @elseif ($item->fk_status_id  == 3)
                        <td><span class="badge badge-secondary">Em trânsito</span></td>


                        @elseif ($item->fk_status_id  == 4)
                        <td><span class="badge badge-primary">Finalizada/Garagem</span></td>


                        @elseif ($item->fk_status_id  == 5)
                        <td><span class="badge badge-danger">Aguardando acerto</span></td>


                        @elseif($item->fk_status_id  == 6)
                        <td><span class="badge badge-dark">Outros Motivos</span></td>

                        @endif

                        <td>
                        <a title="Editar o registro" href="{{route('lancar_viagens.edit', $item)}}"><i class="fas fa-edit text-info mr-1"></i></a>
                        <a title="Excluir o registro" href="{{route('lancar_viagens.modal', $item)}}"><i class="fas fa-trash text-danger mr-1"></i></a>
                        <a title="Acertar Viagem" href="{{route('lancar_viagens.modal', $item)}}"><i class="far fa-handshake"></i></a>
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
                <form method="POST" action="{{route('lancar_viagens.delete', $id)}}">
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
