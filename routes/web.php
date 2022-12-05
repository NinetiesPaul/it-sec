<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AgenteController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\ArmaController;
use App\Http\Controllers\Admin\AtendimentoController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\VeiculoController;
use App\Http\Controllers\Cliente\ClienteController as Cliente;
use App\Http\Controllers\Cliente\AtendimentoController as AtendimentoCliente;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ Controller::class, 'index' ]);

Route::get('/admin', [ AdminController::class, 'index' ])->name('admin');

Route::get('/admin/cliente', [ ClienteController::class, 'index' ])->name('admin.cliente');
Route::post('/admin/cliente', [ ClienteController::class, 'store' ]);
Route::get('/admin/cliente/{usuarioId}', [ ClienteController::class, 'edit' ]);
Route::put('/admin/cliente/{usuarioId}', [ ClienteController::class, 'update' ]);

Route::get('/admin/agente', [ AgenteController::class, 'index' ])->name('admin.agente');
Route::post('/admin/agente', [ AgenteController::class, 'store' ]);
Route::get('/admin/agente/{usuarioId}', [ AgenteController::class, 'edit' ]);
Route::get('/admin/agente/{usuarioId}/uso', [ AgenteController::class, 'usage' ]);
Route::put('/admin/agente/{usuarioId}', [ AgenteController::class, 'update' ]);

Route::get('/admin/arma', [ ArmaController::class, 'index' ])->name('admin.arma');
Route::post('/admin/arma', [ ArmaController::class, 'store' ]);
Route::get('/admin/arma/{armaId}', [ ArmaController::class, 'edit' ]);
Route::put('/admin/arma/{armaId}', [ ArmaController::class, 'update' ]);
Route::get('/admin/arma/{armaId}/uso', [ ArmaController::class, 'usage' ]);
Route::post('/admin/arma/{armaId}/atribuir', [ ArmaController::class, 'assign' ]);

Route::get('/admin/area', [ AreaController::class, 'index' ])->name('admin.area');
Route::post('/admin/area', [ AreaController::class, 'store' ]);
Route::get('/admin/area/{areaId}', [ AreaController::class, 'edit' ]);
Route::put('/admin/area/{areaId}', [ AreaController::class, 'update' ]);
Route::get('/admin/area/{areaId}/uso', [ AreaController::class, 'usage' ]);
Route::post('/admin/area/{areaId}/atribuir', [ AreaController::class, 'assign' ]);

Route::get('/admin/veiculo', [ VeiculoController::class, 'index' ])->name('admin.veiculo');
Route::post('/admin/veiculo', [ VeiculoController::class, 'store' ]);
Route::get('/admin/veiculo/{veiculoId}', [ VeiculoController::class, 'edit' ]);
Route::put('/admin/veiculo/{veiculoId}', [ VeiculoController::class, 'update' ]);
Route::get('/admin/veiculo/{veiculoId}/uso', [ VeiculoController::class, 'usage' ]);
Route::post('/admin/veiculo/{veiculoId}/atribuir', [ VeiculoController::class, 'assign' ]);
Route::get('/admin/veiculo/{veiculoId}/manutencao', [ VeiculoController::class, 'indexMaintenance' ]);
Route::post('/admin/veiculo/{veiculoId}/manutencao', [ VeiculoController::class, 'storeMaintenance' ]);

Route::get('/admin/atendimentos', [ AtendimentoController::class, 'index' ]);
Route::get('/admin/atendimento/{atendimentoId}', [ AtendimentoController::class, 'show' ]);
Route::get('/admin/atendimentos/contar', [ AtendimentoController::class, 'counter' ]);

Route::get('/cliente', [ Cliente::class, 'index' ]);
Route::get('/atendimento', [ Cliente::class, 'help' ]);
Route::get('/atendimentos', [ Cliente::class, 'requests' ]);
Route::post('/cliente/{clienteId}/atendimento', [ AtendimentoCliente::class, 'store' ]);
Route::get('/cliente/{clienteId}/atendimento/{atendimentoId}', [ AtendimentoCliente::class, 'show' ]);
