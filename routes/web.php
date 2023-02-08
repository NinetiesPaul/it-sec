<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Cliente\ClientController as Client;
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
    Route::get('/agent', [ Agent::class, 'index' ])->name('agent');
    Route::get('/agent/call/{callId}', [ Agent::class, 'showCall' ]);
    Route::get('/ajax/calls/{agentId}', [ Agent::class, 'ajaxShowCalls' ]);
    Route::post('/ajax/call', [ Agent::class, 'ajaxTakeCall' ]);
});

Route::middleware(['auth:client'])->group(function () {
    Route::get('/client', [ Client::class, 'index' ])->name('client');
    Route::get('/call', [ Client::class, 'call' ]);
    Route::get('/calls', [ Client::class, 'calls' ]);
    Route::post('/call/{clientId}', [ Client::class, 'store' ]);
    Route::get('/call/{callId}', [ Client::class, 'viewCall' ])->name('call');

    Route::get('/ajax/call/{callId}', [ Client::class, 'ajaxViewCall' ]);
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin', [ AdminController::class, 'index' ])->name('admin');

    Route::get('/admin/agent', [ AgentController::class, 'index' ])->name('admin.agent');
    Route::post('/admin/agent', [ AgentController::class, 'store' ]);
    Route::get('/admin/agent/{userId}', [ AgentController::class, 'edit' ]);
    Route::get('/admin/agent/{userId}/usage', [ AgentController::class, 'usage' ]);
    Route::put('/admin/agent/{userId}', [ AgentController::class, 'update' ]);
    
    Route::get('/admin/client', [ ClientController::class, 'index' ])->name('admin.client');
    Route::post('/admin/client', [ ClientController::class, 'store' ]);
    Route::get('/admin/client/{userId}', [ ClientController::class, 'edit' ]);
    Route::put('/admin/client/{userId}', [ ClientController::class, 'update' ]);
    
    Route::get('/admin/equipment', [ EquipmentController::class, 'index' ])->name('admin.equipment');
    Route::post('/admin/equipment', [ EquipmentController::class, 'store' ]);
    Route::get('/admin/equipment/{equipmentId}', [ EquipmentController::class, 'edit' ]);
    Route::put('/admin/equipment/{equipmentId}', [ EquipmentController::class, 'update' ]);
    Route::get('/admin/equipment/{equipmentId}/usage', [ EquipmentController::class, 'usage' ]);
    Route::post('/admin/equipment/{equipmentId}/assign', [ EquipmentController::class, 'assign' ]);
    
    Route::get('/admin/area', [ AreaController::class, 'index' ])->name('admin.area');
    Route::post('/admin/area', [ AreaController::class, 'store' ]);
    Route::get('/admin/area/{areaId}', [ AreaController::class, 'edit' ]);
    Route::put('/admin/area/{areaId}', [ AreaController::class, 'update' ]);
    Route::get('/admin/area/{areaId}/usage', [ AreaController::class, 'usage' ]);
    Route::post('/admin/area/{areaId}/assign', [ AreaController::class, 'assign' ]);
    
    Route::get('/admin/vehicle', [ VehicleController::class, 'index' ])->name('admin.vehicle');
    Route::post('/admin/vehicle', [ VehicleController::class, 'store' ]);
    Route::get('/admin/vehicle/{veiculoId}', [ VehicleController::class, 'edit' ]);
    Route::put('/admin/vehicle/{veiculoId}', [ VehicleController::class, 'update' ]);
    Route::get('/admin/vehicle/{veiculoId}/usage', [ VehicleController::class, 'usage' ]);
    Route::post('/admin/vehicle/{veiculoId}/assign', [ VehicleController::class, 'assign' ]);
    Route::get('/admin/vehicle/{veiculoId}/maintenance', [ VehicleController::class, 'indexMaintenance' ]);
    Route::post('/admin/vehicle/{veiculoId}/maintenance', [ VehicleController::class, 'storeMaintenance' ]);

    Route::post('/email_check', [ AdminController::class, 'emailCheck' ]);
});

Route::get('/logout', [ LoginController::class, 'logout' ]);