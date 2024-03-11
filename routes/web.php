<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\UserController;

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
    Route::get('/admin/mata-kuliah', [MataKuliahController::class, "getMataKuliah"])->name('admin-mata-kuliah');
    Route::get('/admin/user', [UserController::class, "getUsers"])->name('admin-users');
    Route::get('/admin/profile', [Controller::class, 'profileAdmin'])->name('admin-profile');
});

Route::get('/user', [Controller::class, "indexUser"]);
Route::get('/user/mata-kuliah', [MataKuliahController::class, "getMataKuliahUser"])->name('user-mata-kuliah');
Route::get('/logout', [Controller::class, "logout"]);

