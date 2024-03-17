<?php

namespace App\Http\Controllers;

use App\Models\funcoe;
use Illuminate\Http\Request;

class CadFuncoesController extends Controller
{
    public function index()
    {
        $tabela = funcoe::orderby('id', 'desc')->paginate();
        return view('painel-admin.funcoes.index', ['itens' => $tabela]);
    }

    public function create()
    {
        return view('painel-admin.funcoes.create');
    }


    public function insert(Request $request)
    {
        $tabela = new funcoe();
        $tabela->nome= $request->nome;
        $tabela->codigo= $request->codigo;


        $itens = funcoe::where('nome', '=', $request->nome)->count();

        if ($itens > 0) {
            echo "<script language='javascript'> window.alert('Registro já Cadastrado!') </script>";
            return view('painel-admin.funcoes.create');
        } else

            $tabela->save();
        return redirect()->route('funcoes.index');
    }


    public function edit(funcoe $item)
    {
        return view('painel-admin.funcoes.edit', ['item' => $item]);
    }


    public function editar(Request $request, funcoe $item)
    {

        $item->nome = $request->nome;
        $item->codigo = $request->codigo;
        

        $oldnome = $request->nome;

        if ($oldnome != $request->nome) {

            $itens0 = funcoe::where('nome', '=', $request->nome)->count();

            if ($itens0 > 0) {
                echo "<script language='javascript'> window.alert('Função já Cadastrada!') </script>";
                return view('painel-admin.funcoes.edit', ['item' => $item]);
            }
        }


        $item->save();
        return redirect()->route('funcoes.index');
    }


   public function delete(funcoe $item)
    {
        $item->delete();
      return redirect()->route('funcoes.index');
    }

   public function modal($id)
        {
       $item = funcoe::orderby('id', 'desc')->paginate();
       return view('painel-admin.funcoes.index', ['itens' => $item, 'id' => $id]);
   }
}
