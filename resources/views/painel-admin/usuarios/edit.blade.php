use App\Models\tipos;
@extends('template.painel-admin')
@section('title', 'Editar Usuarios')
@section('content')
<h5 class="mb-4">EDIÇÃO DE Usuários</h5>
<form method="POST" action="{{route('usuarios.editar', $item)}}">
    @csrf
    @method('put')

    <div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input value="{{$item->nome}}" type="text" class="form-control" id="nome" name="nome" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">CPF</label>
                <input value="{{$item->cpf}}" type="text" maxlength=2 class="form-control" id="cpf" name="cpf" required>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="exampleInputEmail1">Usuário</label>
                <input value="{{$item->usuario}}" type="email" class="form-control" id="" name="usuario" required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Senha</label>
                <input value="{{$item->senha}}" type="password" class="form-control" id="" name="senha" required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Nível de acesso</label>
                <select required class="form-control" name="fk_id_nivel">
                <?php
                    use App\Models\tipos_nivei;
                    $tabela = tipos_nivei::all();

                    $nivel = tipos_nivei::where('id', '=', $item->fk_id_nivel)->first();
                    if ($item->nivel != '0') {
                        $nivel = $nivel->nome_nivel;
                    }else{
                    $nivel = '0';
                    }
                    ?>
                    <?php if($nivel != '0'){ ?>
                    <option value='{{$item->fk_id_nivel}}' >{{$nivel}}</option>
                    <?php } ?>
                    
                    <option value='0' >Selecione um nível</option>
                    @foreach($tabela as $val)
                    <?php if($nivel != $val->nome_nivel){ ?>
                    <option value='{{$val->id}}' >{{$val->nome_nivel}}</option>
                    <?php } ?>
                    @endforeach

                </select>
                <div>

                </div>

            </div>
            <input value="{{$item->cpf}}" type="hidden" class="form-control" name="oldcpf">
            <button type="submit" class="btn btn-primary">Salvar Edição</button>
            </p>
</form>
@endsection
