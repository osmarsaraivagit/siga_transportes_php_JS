@extends('template.painel-admin')
@section('title', 'Usuários')
@section('content')
<?php

use App\Models\tipos_nivei;

@session_start();
if (@$_SESSION['nivel_usuario'] != 1) {
    echo "<script language='javascript'> window.location='./' </script>";
}
if (!isset($id)) {
    $id = "";
}

?>


<div class="container">

    <a href="{{route('usuarios.inserir')}}" type="button" class="mt-4 mb-4 btn btn-primary">Cadastrar usuários</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Usuário</th>
                                <th>Senha</th>
                                <th>Nível</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($itens as $item)
                            <?php

                            $nivel = tipos_nivei::where('id', '=', $item->fk_id_nivel)->first();
                            if ($item->nivel != '0') {
                                $nivel = $nivel->nome_nivel;
                            } else {
                                $nivel = 'Nenhum nivel selecionado';
                            }

                            ?>

                            <tr>
                                <td>{{$item->nome}}</td>
                                <td>{{$item->usuario}}</td>
                                <td>{{md5($item->senha)}}</td>
                                <td>{{$nivel}}</td>

                                <td>

                                    <a href="{{route('usuarios.modal', $item)}}"><i class="fas fa-trash text-danger mr-1"></i></a>
                                    <a href="{{route('usuarios.edit', $item)}}"><i class="fas fa-edit text-info mr-1"></i></a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
                    <form method="POST" action="{{route('usuarios.delete', $id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>


        <?php
        if (@$id != "") {
            echo "<script>$('#exampleModal').modal('show');</script>";
        }
        ?>

        @endsection
