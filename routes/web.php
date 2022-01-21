<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\InterpreteController;
use App\Http\controllers\Trackcontroller;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource("interprete", InterpreteController::class );

Route::resource("track", Trackcontroller::class );