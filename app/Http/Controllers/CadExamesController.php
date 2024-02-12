<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadExamesController extends Controller
{

    public function index()
    {
        $tabela = exame::orderby('id', 'desc')->paginate();
        return view('painel-admin.exames.index', ['itens' => $tabela]);
    }

    public function create()
    {
        return view('painel-admin.exames.create');
    }


    public function insert(Request $request)
    {
        $tabela = new exame();
        $tabela->nome_exame = $request->nome_exame;


        $itens0 = exame::where('nome_exame', '=', $request->nome_exame)->count();


        if ($itens0 > 0) {
            echo "<script language='javascript'> window.alert('Registro já Cadastrado!') </script>";
            return view('painel-admin.exames.create');
        } else

            $tabela->save();
        return redirect()->route('exames.index');
    }

    public function edit(exame $item)
    {
        return view('painel-admin.exames.edit', ['item' => $item]);
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
