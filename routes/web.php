<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarsInfoController;
use App\Http\Controllers\RepairController;

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

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/cars', [CarController::class, 'index'])->name('cars');
Route::post('/cars', [CarController::class, 'store']);

Route::get('/cars/{car}/edit', [CarController::class, 'edit']);
Route::put('/cars/{car}', [CarController::class, 'update']);
Route::get('/cars/{car}', [CarController::class, 'destroy']);
Route::delete('/cars/{car}', [CarController::class, 'destroy']);



Route::get('/repairs', [RepairController::class, 'index'])->name('repairs');
Route::get('/repairs/{car}', [RepairController::class, 'add']);
Route::post('/repairs/{car}', [RepairController::class, 'store']);
Route::get('repairs/search/{car}', [RepairController::class, 'search']);
Route::get('repairs/invoice/{repair}', [RepairController::class, 'invoice']);
Route::get('repairs/invoice/{repair}/pdf', [RepairController::class, 'generatePDF']);


Route::get('/repairs/{repair}/edit', [RepairController::class, 'edit']);
Route::put('/repairs/{repair}', [RepairController::class, 'update']);
Route::delete('/repairs/{repair}', [RepairController::class, 'destroy']);

