<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AssignmentTemplateController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanionController;
use App\Http\Controllers\CreateAssignmentsFromTemplateController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'clients' => ClientController::class,
]);

Route::apiResources([
    'companions' => CompanionController::class,
]);

Route::apiResources([
    'assignments' => AssignmentController::class,
]);

Route::apiResources([
    'assignment-templates' => AssignmentTemplateController::class,
]);

Route::post('/create-assignments-from-template', CreateAssignmentsFromTemplateController::class);

Route::apiResources([
    'users' => UserController::class,
]);

Route::prefix('balances')->group(function () {
    Route::get('/clients', [BalanceController::class, 'getClientsBalance']);
    Route::get('/companions', [BalanceController::class, 'getCompanionsBalance']);
});
