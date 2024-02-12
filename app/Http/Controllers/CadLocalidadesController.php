<?php

namespace App\Http\Controllers;

use App\Models\localidade;
use Illuminate\Http\Request;

class CadLocalidadesController extends Controller
{
    public function index()
    {
        $tabela = localidade::orderby('id', 'desc')->paginate();
        return view('painel-admin.localidades.index', ['itens' => $tabela]);
    }

    public function create()
    {
        return view('painel-admin.localidades.create');
    }


    public function insert(Request $request)
    {
        $tabela = new localidade();
        $tabela->cidade = $request->cidade;
        $tabela->estado = $request->estado;
        $tabela->pais = $request->pais;

        $itens0 = localidade::where('cidade', '=', $request->cidade)->count();
        $itens1 = localidade::where('estado', '=', $request->estado)->count();

        if ($itens0 > 0 && $itens1 > 0) {
            echo "<script language='javascript'> window.alert('Registro já Cadastrado!') </script>";
            return view('painel-admin.localidades.create');
        } else

            $tabela->save();
        return redirect()->route('localidades.index');
    }

    public function edit(localidade $item)
    {
        return view('painel-admin.localidades.edit', ['item' => $item]);
    }


    public function editar(Request $request, localidade $item)
    {

        $item->cidade = $request->cidade;
        $item->estado = $request->estado;
        $item->pais = $request->pais;

        $oldcidade = $request->oldcidade;




        if ($oldcidade != $request->cidade) {

            $itens0 = localidade::where('cidade', '=', $request->cidade)->count();
            $itens1 = localidade::where('estado', '=', $request->estado)->count();

            if ($itens0 > 0 && $itens1 > 0) {
                echo "<script language='javascript'> window.alert('Cidade já Cadastrada!') </script>";
                return view('painel-admin.localidades.edit', ['item' => $item]);
            }
        }



        $item->save();
        return redirect()->route('localidades.index');
    }


    public function delete(localidade $item)
    {
        $item->delete();
        return redirect()->route('localidades.index');
    }



    public function modal($id)
    {
        $item = localidade::orderby('id', 'desc')->paginate();
        return view('painel-admin.localidades.index', ['itens' => $item, 'id' => $id]);
    }
}
