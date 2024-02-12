<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;

class CadClientesController extends Controller
{
    public function index()
    {
        $tabela = cliente::orderby('id', 'desc')->paginate();
        return view('painel-admin.clientes.index', ['itens' => $tabela]);
    }

    public function create()
    {
        return view('painel-admin.clientes.create');
    }


    public function insert(Request $request)
    {
        $tabela = new cliente();
        $tabela->nome = $request->nome;
        $tabela->CNPJ = $request->CNPJ;
        $tabela->ie = $request->ie;
        $tabela->email = $request->email;
        $tabela->endereco = $request->endereco;
        $tabela->telefone = $request->telefone;
        $tabela->data_cadastro = $request->data_cadastro;
        $tabela->fk_cidades_id = $request->fk_cidades_id;

        $itens = cliente::where('CNPJ', '=', $request->CNPJ)->count();

        if ($itens > 0) {
            echo "<script language='javascript'> window.alert('Registro já Cadastrado!') </script>";
            return view('painel-admin.clientes.create');
        } else

            $tabela->save();
        return redirect()->route('clientes.index');
    }

    
    public function edit(cliente $item)
    {
        return view('painel-admin.clientes.edit', ['item' => $item]);
    }


    public function editar(Request $request, cliente $item)
    {

        $item->nome = $request->nome;
        $item->CNPJ = $request->CNPJ;
        $item->ie = $request->ie;
        $item->email = $request->email;
        $item->endereco = $request->endereco;
        $item->telefone = $request->telefone;
        $item->data_cadastro = $request->data_cadastro;
        $item->fk_cidades_id = $request->fk_cidades_id;
        
        $oldcnpj = $request->oldcnpj;

        if ($oldcnpj != $request->cnpj) {

            $itens0 = cliente::where('CNPJ', '=', $request->CNPJ)->count();

            if ($itens0 > 0) {
                echo "<script language='javascript'> window.alert('Cliente já Cadastrado!') </script>";
                return view('painel-admin.clientes.edit', ['item' => $item]);
            }
        }


        $item->save();
        return redirect()->route('clientes.index');
    }


   public function delete(cliente $item)
    {
        $item->delete();
      return redirect()->route('clientes.index');
    }

   public function modal($id)
        {
       $item = cliente::orderby('id', 'desc')->paginate();
       return view('painel-admin.clientes.index', ['itens' => $item, 'id' => $id]);
   }
}
