<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [Controller::class, "indexLogin"]);

Route::post('/', [Controller::class, "userLogin"]);

Route::middleware(['CheckAdmin'])->group(function() {
    Route::get('/admin', [Controller::class, 'indexAdmin']);
    Route::get('/admin/mata-kuliah', [Controller::class, "getMataKuliah"]);
});

Route::get('/user', [Controller::class, "indexUser"]);
Route::get('/user/mata-kuliah', [Controller::class, "getMataKuliahUser"]);
Route::get('/logout', [Controller::class, "logout"]);

