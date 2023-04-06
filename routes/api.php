<?php

use App\Http\Controllers\GarageController;
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
Route::prefix('v1')->group(function () {

    Route::group(['prefix' => 'garages'], static function () {

        Route::get('/', [GarageController::class, 'getAll'])->name('getAll');

        Route::get('/by-country/{country}', [GarageController::class, 'getByCountry'])
            ->name('getByCountry');

        Route::get('/by-owner/{owner}', [GarageController::class, 'getByOwner'])
            ->name('getByOwner');

        Route::get('/by-location/{latitude}/{longitude}/{distance}', [GarageController::class, 'getByLocation'])
            ->name('getByLocation');
    });

});

