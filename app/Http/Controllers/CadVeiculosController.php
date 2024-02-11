<?php

namespace App\Http\Controllers;

use App\Models\veiculo;
use Illuminate\Http\Request;

class CadVeiculosController extends Controller
{
    public function index()
    {
        $tabela = veiculo::orderby('id', 'desc')->paginate();
        return view('painel-admin.veiculos.index', ['itens' => $tabela]);
    }

    public function create()
    {
        return view('painel-admin.veiculos.create');
    }


    public function insert(Request $request)
    {
        $tabela = new veiculo();
        $tabela->fk_tipo_veiculo_id = $request->fk_tipo_veiculo_id;
        $tabela->marca = $request->marca;
        $tabela->modelo = $request->modelo;
        $tabela->placas = $request->placas;
        $tabela->dataCompra = $request->dataCompra;
        $tabela->fk_empresas_id = $request->fk_empresas_id;
        $tabela->fk_frota_id = $request->fk_frota_id;
        $tabela->tipo_aquisicao = $request->tipo_aquisicao;
        $tabela->km_inicial = $request->km_inicial;
        $tabela->fk_situcoes_id = $request->fk_situacoes_id;


        $itens = veiculo::where('placas', '=', $request->placas)->count();

        if ($itens > 0) {
            echo "<script language='javascript'> window.alert('Veículo já Cadastrado!') </script>";
            return view('painel-admin.veiculos.create');
        } else

            $tabela->save();
        return redirect()->route('veiculos.index');
    }


    public function edit(veiculo $item)
    {
        return view('painel-admin.veiculos.edit', ['item' => $item]);
    }


    public function editar(Request $request, veiculo $item)
    {

    
        $item->fk_tipo_veiculo_id = $request->fk_tipo_veiculo_id;
        $item->marca = $request->marca;
        $item->modelo = $request->modelo;
        $item->placas = $request->placas;
        $item->dataCompra = $request->dataCompra;
        $item->fk_empresas_id = $request->fk_empresas_id;
        $item->fk_frota_id = $request->fk_frota_id;
        $item->tipo_aquisicao = $request->tipo_aquisicao;
        $item->km_inicial = $request->km_inicial;
        $item->fk_situcoes_id = $request->fk_situacoes_id;



        $oldplacas = $request->oldplacas;

        if ($oldplacas != $request->placas) {

            $itens0 = veiculo::where('placas', '=', $request->placas)->count();

            if ($itens0 > 0) {
                echo "<script language='javascript'> window.alert('Veículo já Cadastrado!') </script>";
                return view('painel-admin.veiculos.edit', ['item' => $item]);
            }
        }


        $item->save();
        return redirect()->route('veiculos.index');
    }


    public function delete(veiculo $item)
    {
        $item->delete();
        return redirect()->route('veiculos.index');
    }

    public function modal($id)
    {
        $item = veiculo::orderby('id', 'desc')->paginate();
        return view('painel-admin.veiculos.index', ['itens' => $item, 'id' => $id]);
    }
}
