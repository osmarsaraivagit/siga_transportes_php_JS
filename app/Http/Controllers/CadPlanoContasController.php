<?php

namespace App\Http\Controllers;

use App\Models\plano_conta;
use Illuminate\Http\Request;

class CadPlanoContasController extends Controller
{
    public function index()
    {
        $tabela = plano_conta::orderby('id', 'desc')->paginate();
        return view('painel-financeiro.plano_contas.index', ['itens' => $tabela]);
    }

    public function create()
    {
        return view('painel-financeiro.plano_contas.create');
    }

    public function insert(Request $request)
    {

        $num_edit = $request->saldo;
        //settype($num, "float");
        $english_format_number = number_format(str_replace(",", ".", str_replace(".", "", $num_edit)), 2, '.', '');

        $tabela = new plano_conta();

        $tabela->tipo = $request->tipo;
        $tabela->conta = $request->conta;
        $tabela->descricao = $request->descricao;
        $tabela->sigla_situacao = $request->sigla_situacao;
        $tabela->saldo = $english_format_number;

        $itens = plano_conta::where('conta', '=', $request->conta)->count();

        if ($itens > 0) {
            echo "<script language='javascript'> window.alert('Conta já Cadastrada!') </script>";
            return view('painel-financeiro.plano_contas.create');
        } else {
            $tabela->save();
        }

        return redirect()->route('plano_contas.index');
    }

    public function edit(plano_conta $item)
    {
    return view('painel-financeiro.plano_contas.edit', ['item' => $item]);
    }

    public function editar(Request $request, plano_conta $item)
    {

        $num_edit = $request->saldo;
        //settype($num, "float");
        $english_format_number = number_format(str_replace(",",".",str_replace(".","",$num_edit)), 2, '.', '');

        $item->tipo = $request->tipo;
        $item->conta = $request->conta;
        $item->descricao = $request->descricao;
        $item->sigla_situacao = $request->sigla_situacao;
        $item->saldo = $english_format_number;

        $oldconta = $request->oldconta;

        if ($oldconta != $request->conta) {

            $itens0 = plano_conta::where('conta', '=', $request->conta)->count();

            if ($itens0 > 0) {
                echo "<script language='javascript'> window.alert('Conta já Cadastrada!') </script>";
                return view('painel-financeiro.plano_contas.edit', ['item' => $item]);
            }
        }

        $item->save();
        return redirect()->route('plano_contas.index');
    }

    public function delete(plano_conta $item)
    {
        $item->delete();
        return redirect()->route('plano_contas.index');
    }

    public function modal($id)
    {
        $item = plano_conta::orderby('id', 'desc')->paginate();
        return view('painel-financeiro.plano_contas.index', ['itens' => $item, 'id' => $id]);
    }
}
