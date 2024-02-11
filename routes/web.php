<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CadFrotasController;
use App\Http\Controllers\CadClientesController;
use App\Http\Controllers\CadEmpresasController;
use App\Http\Controllers\CadVeiculosController;
use App\Http\Controllers\CadSituacoesController;
use App\Http\Controllers\CadDocumentosController;
use App\Http\Controllers\CadDocVeiculosController;
use App\Http\Controllers\CadLocalidadesController;
use App\Http\Controllers\CadFornecedoresController;
use App\Http\Controllers\CadTiposVeiculosController;



Route::get('/', HomeController::class)->name('home');
Route::get('home-admin', [AdminController::class, 'index'])->name('admin.index');
Route::put('admin/{usuario}', [AdminController::class, 'editar'])->name('admin.editar');

Route::post('home-manutencao', [AdminController::class, 'index'])->name('manutencao.index');


Route::post('painel', [UsuarioController::class, 'login'])->name('usuarios.login');
Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::delete('usuarios/{item}', [UsuarioController::class, 'delete'])->name('usuarios.delete');
Route::get('usuarios/{item}/delete', [UsuarioController::class, 'modal'])->name('usuarios.modal');
Route::get('/', [UsuarioController::class, 'logout'])->name('usuarios.logout');

Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('usuarios/inserir', [UsuarioController::class, 'create'])->name('usuarios.inserir');
Route::post('usuarios', [UsuarioController::class, 'insert'])->name('usuarios.insert');
Route::get('usuarios/{item}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('usuarios/{item}', [UsuarioController::class, 'editar'])->name('usuarios.editar');

Route::get('localidades', [CadLocalidadesController::class, 'index'])->name('localidades.index');
Route::get('localidades/inserir', [CadLocalidadesController::class, 'create'])->name('localidades.inserir');
Route::post('localidades', [CadLocalidadesController::class, 'insert'])->name('localidades.insert');
Route::get('localidades/{item}/edit', [CadLocalidadesController::class, 'edit'])->name('localidades.edit');
Route::put('localidades/{item}', [CadLocalidadesController::class, 'editar'])->name('localidades.editar');
Route::get('localidades/{item}/delete', [CadLocalidadesController::class, 'modal'])->name('localidades.modal');
Route::delete('localidades/{item}', [CadLocalidadesController::class, 'delete'])->name('localidades.delete');

Route::get('clientes', [CadClientesController::class, 'index'])->name('clientes.index');
Route::get('clientes/inserir', [CadClientesController::class, 'create'])->name('clientes.inserir');
Route::post('clientes', [CadClientesController::class, 'insert'])->name('clientes.insert');
Route::get('clientes/{item}/edit', [CadClientesController::class, 'edit'])->name('clientes.edit');
Route::put('clientes/{item}', [CadClientesController::class, 'editar'])->name('clientes.editar');
Route::get('clientes/{item}/delete', [CadClientesController::class, 'modal'])->name('clientes.modal');
Route::delete('clientes/{item}', [CadClientesController::class, 'delete'])->name('clientes.delete');


Route::get('fornecedores', [CadFornecedoresController::class, 'index'])->name('fornecedores.index');
Route::get('fornecedores/inserir', [CadFornecedoresController::class, 'create'])->name('fornecedores.inserir');
Route::post('fornecedores', [CadFornecedoresController::class, 'insert'])->name('fornecedores.insert');
Route::get('fornecedores/{item}/edit', [CadFornecedoresController::class, 'edit'])->name('fornecedores.edit');
Route::put('fornecedores/{item}', [CadFornecedoresController::class, 'editar'])->name('fornecedores.editar');
Route::get('fornecedores/{item}/delete', [CadFornecedoresController::class, 'modal'])->name('fornecedores.modal');
Route::delete('fornecedores/{item}', [CadFornecedoresController::class, 'delete'])->name('fornecedores.delete');


Route::get('documentos', [CadDocumentosController::class, 'index'])->name('documentos.index');
Route::get('documentos/inserir', [CadDocumentosController::class, 'create'])->name('documentos.inserir');
Route::post('documentos', [CadDocumentosController::class, 'insert'])->name('documentos.insert');
Route::get('documentos/{item}/edit', [CadDocumentosController::class, 'edit'])->name('documentos.edit');
Route::put('documentos/{item}', [CadDocumentosController::class, 'editar'])->name('documentos.editar');
Route::get('documentos/{item}/delete', [CadDocumentosController::class, 'modal'])->name('documentos.modal');
Route::delete('documentos/{item}', [CadDocumentosController::class, 'delete'])->name('documentos.delete');


Route::get('empresas', [CadEmpresasController::class, 'index'])->name('empresas.index');
Route::get('empresas/inserir', [CadEmpresasController::class, 'create'])->name('empresas.inserir');
Route::post('empresas', [CadEmpresasController::class, 'insert'])->name('empresas.insert');
Route::get('empresas/{item}/edit', [CadEmpresasController::class, 'edit'])->name('empresas.edit');
Route::put('empresas/{item}', [CadEmpresasController::class, 'editar'])->name('empresas.editar');
Route::get('empresas/{item}/delete', [CadEmpresasController::class, 'modal'])->name('empresas.modal');
Route::delete('empresas/{item}', [CadEmpresasController::class, 'delete'])->name('empresas.delete');


Route::get('situacoes', [CadSituacoesController::class, 'index'])->name('situacoes.index');
Route::get('situacoes/inserir', [CadSituacoesController::class, 'create'])->name('situacoes.inserir');
Route::post('situacoes', [CadSituacoesController::class, 'insert'])->name('situacoes.insert');
Route::get('situacoes/{item}/edit', [CadSituacoesController::class, 'edit'])->name('situacoes.edit');
Route::put('situacoes/{item}', [CadSituacoesController::class, 'editar'])->name('situacoes.editar');
Route::get('situacoes/{item}/delete', [CadSituacoesController::class, 'modal'])->name('situacoes.modal');
Route::delete('situacoes/{item}', [CadSituacoesController::class, 'delete'])->name('situacoes.delete');


Route::get('frotas', [CadFrotasController::class, 'index'])->name('frotas.index');
Route::get('frotas/inserir', [CadFrotasController::class, 'create'])->name('frotas.inserir');
Route::post('frotas', [CadFrotasController::class, 'insert'])->name('frotas.insert');
Route::get('frotas/{item}/edit', [CadFrotasController::class, 'edit'])->name('frotas.edit');
Route::put('frotas/{item}', [CadFrotasController::class, 'editar'])->name('frotas.editar');
Route::get('frotas/{item}/delete', [CadFrotasController::class, 'modal'])->name('frotas.modal');
Route::delete('frotas/{item}', [CadFrotasController::class, 'delete'])->name('frotas.delete');



Route::get('tipos-veiculos', [CadTiposVeiculosController::class, 'index'])->name('tipos-veiculos.index');
Route::get('tipos-veiculos/inserir', [CadTiposVeiculosController::class, 'create'])->name('tipos-veiculos.inserir');
Route::post('tipos-veiculos', [CadTiposVeiculosController::class, 'insert'])->name('tipos-veiculos.insert');
Route::get('tipos-veiculos/{item}/edit', [CadTiposVeiculosController::class, 'edit'])->name('tipos-veiculos.edit');
Route::put('tipos-veiculos/{item}', [CadTiposVeiculosController::class, 'editar'])->name('tipos-veiculos.editar');
Route::get('tipos-veiculos/{item}/delete', [CadTiposVeiculosController::class, 'modal'])->name('tipos-veiculos.modal');
Route::delete('tipos-veiculos/{item}', [CadTiposVeiculosController::class, 'delete'])->name('tipos-veiculos.delete');


Route::get('doc_veiculos', [CadDocVeiculosController::class, 'index'])->name('doc_veiculos.index');
Route::get('doc_veiculos/inserir', [CadDocVeiculosController::class, 'create'])->name('doc_veiculos.inserir');
Route::post('doc_veiculos', [CadDocVeiculosController::class, 'insert'])->name('doc_veiculos.insert');
Route::get('doc_veiculos/{item}/edit', [CadDocVeiculosController::class, 'edit'])->name('doc_veiculos.edit');
Route::put('doc_veiculos/{item}', [CadDocVeiculosController::class, 'editar'])->name('doc_veiculos.editar');
Route::get('doc_veiculos/{item}/delete', [CadDocVeiculosController::class, 'modal'])->name('doc_veiculos.modal');
Route::delete('doc_veiculos/{item}', [CadDocVeiculosController::class, 'delete'])->name('doc_veiculos.delete');


Route::get('veiculos', [CadVeiculosController::class, 'index'])->name('veiculos.index');
Route::get('veiculos/inserir', [CadVeiculosController::class, 'create'])->name('veiculos.inserir');
Route::post('veiculos', [CadVeiculosController::class, 'insert'])->name('veiculos.insert');
Route::get('veiculos/{item}/edit', [CadVeiculosController::class, 'edit'])->name('veiculos.edit');
Route::put('veiculos/{item}', [CadVeiculosController::class, 'editar'])->name('veiculos.editar');
Route::get('veiculos/{item}/delete', [CadVeiculosController::class, 'modal'])->name('veiculos.modal');
Route::delete('veiculos/{item}', [CadVeiculosController::class, 'delete'])->name('veiculos.delete');
