<?php

namespace App\Http\Controllers;

use App\Models\lancar_viagen;
use Illuminate\Http\Request;

class CadLancarViagensController extends Controller
{
        public function index()
        {
            $tabela = lancar_viagen::orderby('id', 'desc')->paginate();
            return view('painel-viagens.lancar_viagens.index', ['itens' => $tabela]);
        }

        public function create()
        {
            return view('painel-viagens.lancar_viagens.create');
        }

        public function insert(Request $request)
        {
            //$num = $request->valor;
            //settype($num, "float");
            //$english_format_number = number_format(str_replace(",",".",str_replace(".","",$num)), 2, '.', '');


            $tabela = new lancar_viagen();

            $tabela->crtc = $request->crtc;
            $tabela->data = $request->data;
            $tabela->fk_frota_id = $request->fk_frota_id;
            $tabela->fk_motorista_id = $request->fk_motorista_id;
            $tabela->fk_origem_id = $request->fk_origem_id;
            $tabela->fk_destino_id = $request->fk_destino_id;
            $tabela->kmInicial = $request->kmInicial;
            $tabela->kmFinal = $request->kmFinal;
            $tabela->kmTotal = $request->kmTotal;
            $tabela->litragem = $request->litragem;
            $tabela->qtdeveiculos = $request->qtdeveiculos;
            $tabela->fk_empresa_id = $request->fk_empresa_id;
            $tabela->obs = $request->obs;
            $tabela->status = $request->status;

            $itens = lancar_viagen::where('crtc', '=', $request->crtc)->count();

            if ($itens > 0) {
                echo "<script language='javascript'> window.alert('Viagem já Cadastrada!') </script>";
                return view('painel-viagens.lancar_viagens.create');
            } else {
                $tabela->save();
            }

            return redirect()->route('lancar_viagens.index');
        }

        public function edit(lancar_viagen $item)
        {
            return view('painel-viagens.lancar_viagens.edit', ['item' => $item]);
        }

        public function editar(Request $request, lancar_viagen $item)
        {


            //$num_edit = $request->valor;
            //settype($num, "float");
            //$english_format_number = number_format(str_replace(",",".",str_replace(".","",$num_edit)), 2, '.', '');


            $item->crtc = $request->crtc;
            $item->data = $request->data;
            $item->fk_frota_id = $request->fk_frota_id;
            $item->fk_motorista_id = $request->fk_motorista_id;
            $item->fk_origem_id = $request->fk_origem_id;
            $item->fk_destino_id = $request->fk_destino_id;
            $item->kmInicial = $request->kmInicial;
            $item->kmFinal = $request->kmFinal;
            $item->kmTotal = $request->kmTotal;
            $item->litragem = $request->litragem;
            $item->qtdeveiculos = $request->qtdeveiculos;
            $item->fk_empresa_id = $request->fk_empresa_id;
            $item->obs = $request->obs;
            $item->status = $request->status;


            $oldcrtc = $request->oldcrtc;

            if ($oldcrtc != $request->crtc) {

                $itens0 = lancar_viagen::where('crtc', '=', $request->crtc)->count();

                if ($itens0 > 0) {
                    echo "<script language='javascript'> window.alert('viagem já Cadastrada!') </script>";
                    return view('painel-viagens.lancar_viagens.edit', ['item' => $item]);
                }
            }

            $item->save();
            return redirect()->route('lancar_viagens.index');
        }

        public function delete(lancar_viagen $item)
        {
            $item->delete();
            return redirect()->route('lancar_viagens.index');
        }

        public function modal($id)
        {
            $item = lancar_viagen::orderby('id', 'desc')->paginate();
            return view('painel-viagens.lancar_viagens.index', ['itens' => $item, 'id' => $id]);
        }
}
