<?php

namespace App\Http\Controllers;

use App\Models\situacoe;
use Illuminate\Http\Request;

class CadSituacoesController extends Controller
{
    public function index()
    {
        $tabela = situacoe::orderby('id', 'desc')->paginate();
        return view('painel-admin.situacoes.index', ['itens' => $tabela]);
    }

    public function create()
    {
        return view('painel-admin.situacoes.create');
    }


    public function insert(Request $request)
    {
        $tabela = new situacoe();
        $tabela->tipo_nome = $request->tipo_nome;


        $itens0 = situacoe::where('tipo_nome', '=', $request->tipo_nome)->count();


        if ($itens0 > 0) {
            echo "<script language='javascript'> window.alert('Registro já Cadastrado!') </script>";
            return view('painel-admin.situacoes.create');
        } else

            $tabela->save();
        return redirect()->route('situacoes.index');
    }

    public function edit(situacoe $item)
    {
        return view('painel-admin.situacoes.edit', ['item' => $item]);
    }


    public function editar(Request $request, situacoe $item)
    {

        $item->tipo_nome = $request->tipo_nome;


        $oldtipo_nome = $request->oldtipo_nome;




        if ($oldtipo_nome != $request->tipo_nome) {

            $itens0 = situacoe::where('tipo_nome', '=', $request->tipo_nome)->count();


            if ($itens0 > 0) {
                echo "<script language='javascript'> window.alert('Situação já Cadastrado!') </script>";
                return view('painel-admin.situacoes.edit', ['item' => $item]);
            }
        }



        $item->save();
        return redirect()->route('situacoes.index');
    }


    public function delete(situacoe $item)
    {
        $item->delete();
        return redirect()->route('situacoes.index');
    }



    public function modal($id)
    {
        $item = situacoe::orderby('id', 'desc')->paginate();
        return view('painel-admin.situacoes.index', ['itens' => $item, 'id' => $id]);
    }
}
