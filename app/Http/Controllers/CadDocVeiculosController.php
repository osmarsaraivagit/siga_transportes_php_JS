<?php

namespace App\Http\Controllers;

use App\Models\doc_veiculo;
use Illuminate\Http\Request;

class CadDocVeiculosController extends Controller
{
    public function index()
    {
        $tabela = doc_veiculo::orderby('id', 'desc')->paginate();
        return view('painel-admin.doc_veiculos.index', ['itens' => $tabela]);
    }

    public function create()
    {
        return view('painel-admin.doc_veiculos.create');
    }


    public function insert(Request $request)
    {
        $tabela = new doc_veiculo();
        $tabela->nome_doc = $request->nome_doc;
        $tabela->data_realizado = $request->data_realizado;
        $tabela->data_vencimento = $request->data_vencimento;

        $itens0 = doc_veiculo::where('nome_doc', '=', $request->nome_doc)->count();



        if ($itens0 > 0) {
            echo "<script language='javascript'> window.alert('Registro já Cadastrado!') </script>";
            return view('painel-admin.doc_veiculos.create');
        } else

            $tabela->save();
        return redirect()->route('doc_veiculos.index');
    }

    public function edit(doc_veiculo $item)
    {
        return view('painel-admin.doc_veiculos.edit', ['item' => $item]);
    }


    public function editar(Request $request, doc_veiculo $item)
    {

        $item->nome_doc = $request->nome_doc;


        $oldnome_doc = $request->oldnome_doc;




        if ($oldnome_doc != $request->nome_doc) {

            $itens0 = doc_veiculo::where('nome_doc', '=', $request->nome_doc)->count();


            if ($itens0 > 0) {
                echo "<script language='javascript'> window.alert('Tipo de documento já Cadastrado!') </script>";
                return view('painel-admin.doc_veiculos.edit', ['item' => $item]);
            }
        }



        $item->save();
        return redirect()->route('doc_veiculos.index');
    }


    public function delete(doc_veiculo $item)
    {
        $item->delete();
        return redirect()->route('doc_veiculos.index');
    }



    public function modal($id)
    {
        $item = doc_veiculo::orderby('id', 'desc')->paginate();
        return view('painel-admin.doc_veiculos.index', ['itens' => $item, 'id' => $id]);
    }
}
