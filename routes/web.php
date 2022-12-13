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
use App\Http\Controllers\Agent\AgentController as Agent;
use App\Http\Controllers\Auth\LoginController;
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

Auth::routes();

Route::get('/', [ Controller::class, 'index' ]);

Route::middleware(['auth:agent'])->group(function () {
    Route::get('/agent', [ Agent::class, 'index' ])->name('agent');;
    Route::get('/ajax/calls/{agentId}', [ Agent::class, 'ajaxShowCalls' ]);
    //Route::get('/call/{callId}', [ Agent::class, 'viewCall' ]);
});

Route::middleware(['auth:client'])->group(function () {
    Route::get('/client', [ Cliente::class, 'index' ])->name('client');;
    Route::get('/call', [ Cliente::class, 'call' ]);
    Route::post('/call/{clientId}', [ Cliente::class, 'store' ]);
    Route::get('/call/{callId}', [ Cliente::class, 'viewCall' ]);

    Route::get('/ajax/call/{callId}', [ Cliente::class, 'ajaxViewCall' ]);
    /*Route::get('/atendimentos', [ Cliente::class, 'requests' ]);
    Route::get('/cliente/{clienteId}/atendimento/{atendimentoId}', [ AtendimentoCliente::class, 'show' ]);*/
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin', [ AdminController::class, 'index' ])->name('admin');

    Route::get('/admin/agent', [ AgenteController::class, 'index' ])->name('admin.agent');
    Route::post('/admin/agent', [ AgenteController::class, 'store' ]);
    Route::get('/admin/agent/{userId}', [ AgenteController::class, 'edit' ]);
    Route::get('/admin/agent/{userId}/usage', [ AgenteController::class, 'usage' ]);
    Route::put('/admin/agent/{userId}', [ AgenteController::class, 'update' ]);
    
    Route::get('/admin/client', [ ClienteController::class, 'index' ])->name('admin.client');
    Route::post('/admin/client', [ ClienteController::class, 'store' ]);
    Route::get('/admin/client/{userId}', [ ClienteController::class, 'edit' ]);
    Route::put('/admin/client/{userId}', [ ClienteController::class, 'update' ]);
    
    Route::get('/admin/equipment', [ ArmaController::class, 'index' ])->name('admin.equipment');
    Route::post('/admin/equipment', [ ArmaController::class, 'store' ]);
    Route::get('/admin/equipment/{equipmentId}', [ ArmaController::class, 'edit' ]);
    Route::put('/admin/equipment/{equipmentId}', [ ArmaController::class, 'update' ]);
    Route::get('/admin/equipment/{equipmentId}/usage', [ ArmaController::class, 'usage' ]);
    Route::post('/admin/equipment/{equipmentId}/assign', [ ArmaController::class, 'assign' ]);
    
    Route::get('/admin/area', [ AreaController::class, 'index' ])->name('admin.area');
    Route::post('/admin/area', [ AreaController::class, 'store' ]);
    Route::get('/admin/area/{areaId}', [ AreaController::class, 'edit' ]);
    Route::put('/admin/area/{areaId}', [ AreaController::class, 'update' ]);
    Route::get('/admin/area/{areaId}/usage', [ AreaController::class, 'usage' ]);
    Route::post('/admin/area/{areaId}/assign', [ AreaController::class, 'assign' ]);
    
    Route::get('/admin/vehicle', [ VeiculoController::class, 'index' ])->name('admin.vehicle');
    Route::post('/admin/vehicle', [ VeiculoController::class, 'store' ]);
    Route::get('/admin/vehicle/{veiculoId}', [ VeiculoController::class, 'edit' ]);
    Route::put('/admin/vehicle/{veiculoId}', [ VeiculoController::class, 'update' ]);
    Route::get('/admin/vehicle/{veiculoId}/usage', [ VeiculoController::class, 'usage' ]);
    Route::post('/admin/vehicle/{veiculoId}/assign', [ VeiculoController::class, 'assign' ]);
    Route::get('/admin/vehicle/{veiculoId}/maintenance', [ VeiculoController::class, 'indexMaintenance' ]);
    Route::post('/admin/vehicle/{veiculoId}/maintenance', [ VeiculoController::class, 'storeMaintenance' ]);

    Route::post('/email_check', [ AdminController::class, 'emailCheck' ]);
});

Route::get('/logout', [ LoginController::class, 'logout' ]);