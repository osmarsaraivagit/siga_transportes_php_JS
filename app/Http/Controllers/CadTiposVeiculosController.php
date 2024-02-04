<?php

namespace App\Http\Controllers;

use App\Models\tipos_veiculo;

use Illuminate\Http\Request;

class CadTiposVeiculosController extends Controller
{
    public function index()
    {
        $tabela = tipos_veiculo::orderby('id', 'desc')->paginate();
        return view('painel-admin.tipos_veiculos.index', ['itens' => $tabela]);
    }

    public function create()
    {
        return view('painel-admin.tipos_veiculos.create');
    }


    public function insert(Request $request)
    {
        $tabela = new tipos_veiculo();
        $tabela->tipo_de_veiculo = $request->tipo_de_veiculo;


        $itens0 = tipos_veiculo::where('tipo_de_veiculo', '=', $request->tipo_de_veiculo)->count();



        if ($itens0 > 0) {
            echo "<script language='javascript'> window.alert('Registro já Cadastrado!') </script>";
            return view('painel-admin.tipos_veiculos.create');
        } else

            $tabela->save();
        return redirect()->route('tipos-veiculos.index');
    }

    public function edit(tipos_veiculo $item)
    {
        return view('painel-admin.tipos_veiculos.edit', ['item' => $item]);
    }


    public function editar(Request $request, tipos_veiculo $item)
    {

        $item->tipo_de_veiculo = $request->tipo_de_veiculo;


        $oldtipo_de_veiculo = $request->oldtipo_de_veiculo;




        if ($oldtipo_de_veiculo != $request->tipo_de_veiculo) {

            $itens0 = tipos_veiculo::where('tipo_de_veiculo', '=', $request->tipo_de_veiculo)->count();


            if ($itens0 > 0) {
                echo "<script language='javascript'> window.alert('Tipo de veículo já Cadastrado!') </script>";
                return view('painel-admin.tipos_veiculos.edit', ['item' => $item]);
            }
        }



        $item->save();
        return redirect()->route('tipos-veiculos.index');
    }


    public function delete(tipos_veiculo $item)
    {
        $item->delete();
        return redirect()->route('tipos-veiculos.index');
    }



    public function modal($id)
    {
        $item = tipos_veiculo::orderby('id', 'desc')->paginate();
        return view('painel-admin.tipos_veiculos.index', ['itens' => $item, 'id' => $id]);
    }
}
