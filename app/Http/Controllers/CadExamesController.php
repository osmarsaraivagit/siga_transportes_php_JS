<?php

namespace App\Http\Controllers;

use App\Models\exame;
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
        $tabela->cid = $request->cid;

        $itens0 = exame::where('nome_exame', '=', $request->nome_exame)->count();

        if ($itens0 > 0) {
            echo "<script language='javascript'> window.alert('Registro já Cadastrado!') </script>";
            return view('painel-admin.exames.create');
        } else {
            $tabela->save();
        }

        return redirect()->route('exames.index');
    }

    public function edit(exame $item)
    {
        return view('painel-admin.exames.edit', ['item' => $item]);
    }

    public function editar(Request $request, exame $item)
    {

        $item->nome_exame = $request->nome_exame;
        $item->cid = $request->cid;

        $oldnome_exame = $request->oldnome_exame;

        if ($oldnome_exame != $request->nome_exame) {

            $itens0 = exame::where('nome_exame', '=', $request->nome_exame)->count();

            if ($itens0 > 0) {
                echo "<script language='javascript'> window.alert('Exame já Cadastrado!') </script>";
                return view('painel-admin.exames.edit', ['item' => $item]);
            }
        }

        $item->save();
        return redirect()->route('exames.index');
    }

    public function delete(exame $item)
    {
        $item->delete();
        return redirect()->route('exames.index');
    }

    public function modal($id)
    {
        $item = exame::orderby('id', 'desc')->paginate();
        return view('painel-admin.exames.index', ['itens' => $item, 'id' => $id]);
    }
}
