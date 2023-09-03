<?php

use App\Http\Controllers\WeatherLogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/get-weather-logs', [WeatherLogController::class, 'getWeatherLogData']);
Route::get('/get-all-city', [WeatherLogController::class, 'getAllCity']);
Route::get('/get-statistics-data', [WeatherLogController::class, 'getStatisticsData']);

Auth::routes();
// Route::middleware(['auth'])->group(function () {
Route::get('/', function () {
    return view('welcome');
});
// });
