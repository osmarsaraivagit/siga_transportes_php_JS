<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\statu;

class StatusController extends Controller
{
    public function index()
    {
        $tabela = statu::orderby('id', 'desc')->paginate();
        return view('painel.status.index', ['itens' => $tabela]);
    }

    public function create()
    {
        return view('painel.status.create');
    }


    public function insert(Request $request)
    {
        $tabela = new statu();
        $tabela->nome = $request->nome;
        

        $itens0 = statu::where('nome', '=', $request->nome)->count();
       

        if ($itens0 > 0) {
            echo "<script language='javascript'> window.alert('Registro já Cadastrado!') </script>";
            return view('painel.status.create');
        } else

            $tabela->save();
        return redirect()->route('painel.status.index');
    }

    public function edit(statu $item)
    {
        return view('painel.status.edit', ['item' => $item]);
    }


    public function editar(Request $request, status $item)
    {

        $item->nome = $request->nome;
      

        $oldnome = $request->oldnome;




        if ($oldnome != $request->nome) {

            $itens0 = statu::where('nome', '=', $request->nome)->count();
           

            if ($itens0 > 0) {
                echo "<script language='javascript'> window.alert('Status já Cadastrado!') </script>";
                return view('painel.status.edit', ['item' => $item]);
            }
        }



        $item->save();
        return redirect()->route('painel.status.index');
    }


    public function delete(statu $item)
    {
        $item->delete();
        return redirect()->route('painel.status.index');
    }



    public function modal($id)
    {
        $item = statu::orderby('id', 'desc')->paginate();
        return view('painel.status..index', ['itens' => $item, 'id' => $id]);
    }
}
