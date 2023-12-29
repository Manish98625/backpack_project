<?php

use App\Http\Controllers\StudentCrudController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Route::post('api/districts/{value}', [StudentCrudController::class, 'getDistricts'])->name('districts.select2');
Route::post('api/cities/{value}', [StudentCrudController::class, 'getCities'])->name('cities.select2');
