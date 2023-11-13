@extends('template.painel-admin')
@section('title', 'Inserir Documentos')
@section('content')
<h5 class="mb-4">CADASTRO DE TIPOS DE DOCUMENTOS</h5>
<hr>
<form method="POST" action="{{route('documentos.insert')}}">
    @csrf

    <div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome do documento</label>
                <input type="text" class="form-control" id="" name="nome_doc" required>
            </div>
        </div>
        
    </div>

</p>
<button type="submit" class="btn btn-primary">Salvar</button>


</form>

 
@endsection
