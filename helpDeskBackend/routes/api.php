<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChamadoController;
use App\Http\Controllers\ProblemaController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//usuário
route::get('/chamado', 'ChamadoController@chamados');
route::get('/logChamado/{id}/{alteracao}', 'ChamadoController@adicionarAlteracao');
route::get('/setor', 'AdminController@setor');
route::get('/cadastrarSetor', 'AdminController@cadastrarSetor');
route::get('/alterarSetor/{id}', 'AdminController@alterarSetor');
route::get('/removerSetor/{id}', 'AdminController@removerSetor');
route::get('/problemas', 'ProblemaController@listProblema');
route::get('/cadastrarProblema', 'GerenteController@cadastrarProblema');
route::get('/alterarProblema/{id}', 'GerenteController@alterarProblema');
route::get('/removerProblema/{id}', 'GerenteController@removerProblema');
route::get('/cadastrarGerente', 'AdminController@cadastrarGerente');
route::get('/alterarGerente/{id}', 'AdminController@alterarGerente');
route::get('/removerGerente/{id}', 'AdminController@removerGerente');
route::get('/tecnicos', 'TecnicoController@listTecnicos');
route::get('/cadastarTecnico', 'GerenteController@cadastrarTecnico');
route::get('/alterarTecnico/{id}', 'GerenteController@alterarTecnico');
route::get('/removerTecnico/{id}', 'GerenteController@removerTecnico');
route::get('/encaminharChamado/{id}', 'TecnicoController@encaminharChamado');
route::get('/alterarSituacao/{chamado}/{situacao}', 'TecnicoController@alterarSituacao');
route::get('/atenderChamado/{id}/{tecnico}', 'TecnicoController@atenderChamado');

//usuario
route::post('/cadastrarChamado', 'UsuarioController@cadastrarChamado');
route::get('/chamado/{id}', 'UsuarioController@buscarChamado');
route::put('/alterarChamado/{id}', 'UsuarioController@alterarChamado');
route::delete('/cancelarChamado/{id}', 'UsuarioController@cancelarChamado');
