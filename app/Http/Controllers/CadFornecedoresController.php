<?php

namespace App\Http\Controllers;

use App\Models\fornecedore;
use Illuminate\Http\Request;

class CadFornecedoresController extends Controller
{
    public function index()
    {
        $tabela = fornecedore::orderby('id', 'desc')->paginate();
        return view('painel-admin.fornecedores.index', ['itens' => $tabela]);
    }

    public function create()
    {
        return view('painel-admin.fornecedores.create');
    }


    public function insert(Request $request)
    {
        $tabela = new fornecedore();
        $tabela->nome = $request->nome;
        $tabela->CNPJ = $request->CNPJ;
        $tabela->ie = $request->ie;
        $tabela->email = $request->email;
        $tabela->endereco = $request->endereco;
        $tabela->fone = $request->fone;
        $tabela->responsavel = $request->responsavel;
        $tabela->data_cadastro = $request->data_cadastro;
        $tabela->fk_cidades_id = $request->fk_cidades_id;

        $itens = fornecedore::where('CNPJ', '=', $request->CNPJ)->count();

        if ($itens > 0) {
            echo "<script language='javascript'> window.alert('Registro já Cadastrado!') </script>";
            return view('painel-admin.fornecedores.create');
        } else

            $tabela->save();
        return redirect()->route('fornecedores.index');
    }


    public function edit(fornecedore $item)
    {
        return view('painel-admin.fornecedores.edit', ['item' => $item]);
    }


    public function editar(Request $request, fornecedore $item)
    {

        $item->nome = $request->nome;
        $item->CNPJ = $request->CNPJ;
        $item->ie = $request->ie;
        $item->email = $request->email;
        $item->endereco = $request->endereco;
        $item->fone = $request->fone;
        $item->responsavel = $request->responsavel;
        $item->data_cadastro = $request->data_cadastro;
        $item->fk_cidades_id = $request->fk_cidades_id;

        $oldcnpj = $request->oldcnpj;

        if ($oldcnpj != $request->cnpj) {

            $itens0 = fornecedore::where('CNPJ', '=', $request->CNPJ)->count();

            if ($itens0 > 0) {
                echo "<script language='javascript'> window.alert('Fornecedor já Cadastrado!') </script>";
                return view('painel-admin.fornecedores.edit', ['item' => $item]);
            }
        }


        $item->save();
        return redirect()->route('fornecedores.index');
    }


    public function delete(fornecedore $item)
    {
        $item->delete();
        return redirect()->route('fornecedores.index');
    }

    public function modal($id)
    {
        $item = fornecedore::orderby('id', 'desc')->paginate();
        return view('painel-admin.fornecedores.index', ['itens' => $item, 'id' => $id]);
    }
}
