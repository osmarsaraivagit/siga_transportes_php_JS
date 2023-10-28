<?php

namespace App\Http\Controllers;

use App\Models\empresa;
use Illuminate\Http\Request;

class CadEmpresasController extends Controller
{
    public function index()
    {
        $tabela = empresa::orderby('id', 'desc')->paginate();
        return view('painel-admin.empresas.index', ['itens' => $tabela]);
    }

    public function create()
    {
        return view('painel-admin.empresas.create');
    }


    public function insert(Request $request)
    {
        $tabela = new empresa();
        $tabela->nome = $request->nome;
        $tabela->CNPJ = $request->CNPJ;
        $tabela->ie = $request->ie;
        $tabela->email = $request->email;
        $tabela->endereco = $request->endereco;
        $tabela->fk_cidades_id = $request->fk_cidades_id;
        $tabela->fone = $request->fone;
        $tabela->responsavel = $request->responsavel;
        $tabela->data_inicio = $request->data_inicio;


        $itens = empresa::where('CNPJ', '=', $request->CNPJ)->count();

        if ($itens > 0) {
            echo "<script language='javascript'> window.alert('Registro já Cadastrado!') </script>";
            return view('painel-admin.empresas.create');
        } else

            $tabela->save();
        return redirect()->route('empresas.index');
    }


    public function edit(empresa $item)
    {
        return view('painel-admin.empresas.edit', ['item' => $item]);
    }


    public function editar(Request $request, empresa $item)
    {

        $item->nome = $request->nome;
        $item->CNPJ = $request->CNPJ;
        $item->ie = $request->ie;
        $item->email = $request->email;
        $item->endereco = $request->endereco;
        $item->fk_cidades_id = $request->fk_cidades_id;
        $item->fone = $request->fone;
        $item->responsavel = $request->responsavel;
        $item->data_inicio = $request->data_inicio;
    

        $oldcnpj = $request->oldcnpj;

        if ($oldcnpj != $request->cnpj) {

            $itens0 = empresa::where('CNPJ', '=', $request->CNPJ)->count();

            if ($itens0 > 0) {
                echo "<script language='javascript'> window.alert('Empresa já Cadastrado!') </script>";
                return view('painel-admin.empresas.edit', ['item' => $item]);
            }
        }


        $item->save();
        return redirect()->route('empresas.index');
    }


    public function delete(empresa $item)
    {
        $item->delete();
        return redirect()->route('empresas.index');
    }

    public function modal($id)
    {
        $item = empresa::orderby('id', 'desc')->paginate();
        return view('painel-admin.empresas.index', ['itens' => $item, 'id' => $id]);
    }
}
