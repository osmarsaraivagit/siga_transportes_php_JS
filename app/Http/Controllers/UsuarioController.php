<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function login(Request $request)
    {

        $usuario = $request->usuario;
        $senha = $request->senha;

        $usuarios = usuario::where('usuario', '=', $usuario)->orwhere('cpf', '=', $usuario)->where('senha', '=', $senha)->first();

        if (@$usuarios->id != null) {
            @session_start();
            $_SESSION['id_usuario'] = $usuarios->id;
            $_SESSION['nome_usuario'] = $usuarios->nome;
            $_SESSION['cpf_usuario'] = $usuarios->cpf;
            $_SESSION['usuario_usuario'] = $usuarios->usuario;
            $_SESSION['senha_usuario'] = $usuarios->senha;
            $_SESSION['nivel_usuario'] = $usuarios->fk_id_nivel;

            if ($_SESSION['nivel_usuario'] == 1) {
                return view('painel-admin.index');
            }

            if ($_SESSION['nivel_usuario'] == 2) {
                return view('painel-manutencao.index');
            }

            // if ($_SESSION['nivel_usuario'] == 5) {
            // return view('painel-multas.index');
            // }

            // if ($_SESSION['nivel_usuario'] == 6) {
            // return view('painel-financeiro.index');
            //}

            if ($_SESSION['nivel_usuario'] == 7) {
                //return view('painel-viagens.index');
            }

            //if ($_SESSION['nivel_usuario'] == 9) {
            //  return view('painel-pessoal.index');
            //}

        } else {
            echo "<script language='javascript'> window.alert('Dados Incorretos!') </script>";
            return view('index');
        }
    }

    public function logout()
    {
        @session_start();
        @session_destroy();
        return view('index');
    }

    public function index()
    {
        $tabela = usuario::orderby('id', 'desc')->paginate();
        return view('painel-admin.usuarios.index', ['itens' => $tabela]);
    }

    public function create()
    {
        return view('painel-admin.usuarios.create');
    }

    public function insert(Request $request)
    {
        $tabela = new usuario();
        $tabela->nome = $request->nome;
        $tabela->cpf = $request->cpf;
        $tabela->usuario = $request->usuario;
        $tabela->senha = $request->senha;
        $tabela->fk_id_nivel = $request->fk_id_nivel;

        $itens = usuario::where('cpf', '=', $request->cpf)->count();

        if ($itens > 0) {
            echo "<script language='javascript'> window.alert('Usuário já Cadastrado!') </script>";
            return view('painel-admin.usuarios.create');
        } else {
            $tabela->save();
        }

        return redirect()->route('usuarios.index');
    }

    public function edit(usuario $item)
    {
        return view('painel-admin.usuarios.edit', ['item' => $item]);
    }

    public function editar(Request $request, usuario $item)
    {
        $item->nome = $request->nome;
        $item->cpf = $request->cpf;
        $item->usuario = $request->usuario;
        $item->senha = $request->senha;
        $item->fk_id_nivel = $request->fk_id_nivel;

        $oldcpf = $request->oldcpf;

        if ($oldcpf != $request->cpf) {

            $itens0 = usuario::where('cpf', '=', $request->cpf)->count();

            if ($itens0 > 0) {
                echo "<script language='javascript'> window.alert('Usuário já Cadastrado!') </script>";
                return view('painel-admin.usuarios.edit', ['item' => $item]);
            }
        }

        $item->save();
        return redirect()->route('usuarios.index');
    }

    public function delete(usuario $item)
    {
        $item->delete();
        return redirect()->route('usuarios.index');
    }

    public function modal($id)
    {
        $item = usuario::orderby('id', 'desc')->paginate();
        return view('painel-admin.usuarios.index', ['itens' => $item, 'id' => $id]);
    }
}
