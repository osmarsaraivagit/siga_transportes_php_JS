<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadTiposVeiculosController extends Controller
{
    public function index()
    {
        $tabela = documento::orderby('id', 'desc')->paginate();
        return view('painel-admin.documentos.index', ['itens' => $tabela]);
    }

    public function create()
    {
        return view('painel-admin.documentos.create');
    }


    public function insert(Request $request)
    {
        $tabela = new documento();
        $tabela->nome_doc = $request->nome_doc;
        

        $itens0 = documento::where('nome_doc', '=', $request->nome_doc)->count();
       

        if ($itens0 > 0) {
            echo "<script language='javascript'> window.alert('Registro já Cadastrado!') </script>";
            return view('painel-admin.documentos.create');
        } else

            $tabela->save();
        return redirect()->route('documentos.index');
    }

    public function edit(documento $item)
    {
        return view('painel-admin.documentos.edit', ['item' => $item]);
    }


    public function editar(Request $request, documento $item)
    {

        $item->nome_doc = $request->nome_doc;
      

        $oldnome_doc = $request->oldnome_doc;




        if ($oldnome_doc != $request->nome_doc) {

            $itens0 = documento::where('nome_doc', '=', $request->nome_doc)->count();
           

            if ($itens0 > 0) {
                echo "<script language='javascript'> window.alert('Documento já Cadastrado!') </script>";
                return view('painel-admin.documentos.edit', ['item' => $item]);
            }
        }



        $item->save();
        return redirect()->route('documentos.index');
    }


    public function delete(documento $item)
    {
        $item->delete();
        return redirect()->route('documentos.index');
    }



    public function modal($id)
    {
        $item = documento::orderby('id', 'desc')->paginate();
        return view('painel-admin.documentos.index', ['itens' => $item, 'id' => $id]);
    }
}
