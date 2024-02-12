@extends('template.painel-admin')
@section('title', 'Inserir Usuários')
@section('content')
<h5 class="mb-4">CADASTRO DE USUÁRIOS</h5>
<hr>
<form method="POST" action="{{route('usuarios.insert')}}">
    @csrf

    <div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="exampleInputEmail1">CPF</label>
                <input type="text" maxlength=2 class="form-control" id="cpf" name="cpf" required>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="" name="usuario" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Tipo de Nível</label>
                <select required class="form-control" name="fk_id_nivel">
                    <?php

                    use App\Models\tipos_nivei;

                    $tabela = tipos_nivei::all();
                    ?>

                    <option value=''>Selecionar nível de acesso</option>
                    @foreach($tabela as $item2)
                    <option value='{{$item2->id}}'>{{$item2->nome_nivel}}</option>
                    @endforeach
                </select>
            </div>
        </div>


    </div>

    </p>
    <button type="submit" class="btn btn-primary">Salvar</button>


</form>


@endsection