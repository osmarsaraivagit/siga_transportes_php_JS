<?php

namespace App\Http\Controllers;

use App\Models\frota;
use Illuminate\Http\Request;

class CadFrotasController extends Controller
{
        public function index()
        {
            $tabela = frota::orderby('id', 'desc')->paginate();
            return view('painel-admin.frotas.index', ['itens' => $tabela]);
        }

        public function create()
        {
            return view('painel-admin.frotas.create');
        }


        public function insert(Request $request)
        {
            $tabela = new frota();
            $tabela->nome_frota = $request->nome_frota;
            $tabela->fk_empresas_id = $request->fk_empresas_id;
            $tabela->fk_situacoes_id = $request->fk_situacoes_id;
            $tabela->data_cadastro = $request->data_cadastro;

            $itens = frota::where('nome_frota', '=', $request->nome_frota)->count();

            if ($itens > 0) {
                echo "<script language='javascript'> window.alert('Registro já Cadastrado!') </script>";
                return view('painel-admin.clientes.create');
            } else

                $tabela->save();
            return redirect()->route('frotas.index');
        }


        public function edit(frota $item)
        {
            return view('painel-admin.frotas.edit', ['item' => $item]);
        }


        public function editar(Request $request, frota $item)
        {

            $item->nome_frota = $request->nome_frota;
            $item->fk_empresas_id = $request->fk_empresas_id;
            $item->fk_situacoes_id = $request->fk_situacoes_id;
            $item->data_cadastro = $request->data_cadastro;
           

            $oldnome_frota = $request->nome_frota;

            if ($oldnome_frota != $request->nome_frota) {

                $itens0 = frota::where('nome_frota', '=', $request->nome_frota)->count();

                if ($itens0 > 0) {
                    echo "<script language='javascript'> window.alert('Frota já Cadastrado!') </script>";
                    return view('painel-admin.frotas.edit', ['item' => $item]);
                }
            }


            $item->save();
            return redirect()->route('frotas.index');
        }


       public function delete(frota $item)
        {
            $item->delete();
          return redirect()->route('frotas.index');
        }

       public function modal($id)
            {
           $item = frota::orderby('id', 'desc')->paginate();
           return view('painel-admin.frotas.index', ['itens' => $item, 'id' => $id]);
       }
    }


