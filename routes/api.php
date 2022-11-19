<?php

use App\Http\Controllers\HydraController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;

/* Scorecard Controllers */
use App\Http\Controllers\SpScorecardsController;
use App\Http\Controllers\SpOutcomeIndicatorsController;
use App\Http\Controllers\ProgrammesController;
use App\Http\Controllers\PerspectivesController;
use App\Http\Controllers\OutcomesController;
use App\Http\Controllers\IndicatorsController;
use App\Http\Controllers\MtsfPrioritiesController;
use App\Http\Controllers\DepartmentsController;

use App\Http\Controllers\CorporateScorecardsController;
use App\Http\Controllers\CorporateScorecardIndicatorsController;


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

//use the middleware 'hydra.log' with any request to get the detailed headers, request parameters and response logged in logs/laravel.log

Route::get('main', [HydraController::class, 'hydra']);
Route::get('hydra/version', [HydraController::class, 'version']);

Route::apiResource('users', UserController::class)->except(['edit', 'create', 'store', 'update'])->middleware(['auth:sanctum', 'ability:admin,super-admin']);

Route::post('users', [UserController::class, 'store']);

Route::put('users/{user}', [UserController::class, 'update'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);

Route::post('users/{user}', [UserController::class, 'update'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);

Route::patch('users/{user}', [UserController::class, 'update'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);

Route::get('userinfo ', [UserController::class, 'me'])->middleware('auth:sanctum');

Route::post('login', [UserController::class, 'login']);

Route::post('logout',[UserController::class, 'logout'])->middleware(['auth:sanctum']);


Route::apiResource('roles', RoleController::class)->except(['create', 'edit'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);

Route::apiResource('users.roles', UserRoleController::class)->except(['create', 'edit', 'show', 'update'])->middleware(['auth:sanctum', 'ability:admin,super-admin']);

/* Balanced Scorecard Section API URLs */
/* Sp_Scorecards */
Route::apiResource('spscorecards', SpScorecardsController::class)->except(['create', 'edit'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);
/* Sp_outcome_indicators */
Route::apiResource('spoutcomeindicators', SpOutcomeIndicatorsController::class)->except(['create', 'edit'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);
/* Programmes */
Route::apiResource('programmes', ProgrammesController::class)->except(['create', 'edit'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);
/* Perspectives */
Route::apiResource('perspectives', PerspectivesController::class)->except(['create', 'edit'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);
/* outcomes */
Route::apiResource('outcomes', OutcomesController::class)->except(['create', 'edit'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);
/* outcomes output indicators */
Route::apiResource('indicators', IndicatorsController::class)->except(['create', 'edit'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);

/* mtsf priorities */
Route::apiResource('priorities', MtsfPrioritiesController::class)->except(['create', 'edit'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);
/*  departments */
Route::apiResource('departments', DepartmentsController::class)->except(['create', 'edit'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);
/*  Corporate Scorecards  */
Route::apiResource('corporatescorecards', CorporateScorecardsController::class)->except(['create', 'edit'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);

/*  Corporate Scorecards indicators */
Route::apiResource('corporatescorecardindicators', CorporateScorecardIndicatorsController::class)->except(['create', 'edit'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);
/* Quarters */
Route::apiResource('quarters', QuaterController::class)->except(['create', 'edit'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);
