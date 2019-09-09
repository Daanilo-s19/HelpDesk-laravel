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

route::get('/chamados', 'ChamadoController@chamados');
route::get('/setor', 'AdminController@setor');
route::get('/problemas', 'ProblemaController@listProblema');
route::get('/tecnicos', 'TecnicoController@listTecnicos');
route::get('/chamado/{id_usuario}', 'UsuarioController@buscarChamado');


route::post('/cadastrarProblema', 'GerenteController@cadastrarProblema');
route::post('/cadastrarGerente', 'AdminController@cadastrarGerente');
route::post('/cadastrarTecnico', 'GerenteController@cadastrarTecnico');
route::post('/encaminharChamado/{idChamado}', 'TecnicoController@encaminharChamado');
route::post('/atenderChamado/{idChamado}', 'TecnicoController@atenderChamado');
route::post('/cadastrarChamado', 'UsuarioController@cadastrarChamado');
route::post('/alteracoesChamado/{idchamado}', 'ChamadoController@adicionarAlteracao'); // pq mesmo?
route::post('/cadastrarSetor', 'AdminController@cadastrarSetor');

route::put('/alterarGerente/{id}', 'AdminController@alterarGerente');
route::put('/alterarProblema/{login}', 'GerenteController@alterarProblema');
route::put('/alterarSetor/{idSetor}', 'AdminController@alterarSetor'); // melhor rota <3
route::put('/alterarTecnico/{id}', 'GerenteController@alterarTecnico');
route::put('/alterarSituacao/{chamado}', 'TecnicoController@alterarSituacao');
route::put('/alterarChamado/{idChamado}', 'UsuarioController@alterarChamado');

route::delete('/removerSetor/{idSetor}', 'AdminController@removerSetor');
route::delete('/removerProblema/{idProblema}', 'GerenteController@removerProblema');
route::delete('/removerGerente/{login}', 'AdminController@removerGerente');
route::delete('/removerTecnico/{login}', 'GerenteController@removerTecnico');
route::delete('/cancelarChamado/{idChamado}', 'UsuarioController@cancelarChamado');
