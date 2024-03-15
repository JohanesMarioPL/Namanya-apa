<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

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
    Route::get('/prodi', [Controller::class, 'indexProdi']);
    Route::get('/prodi/mata-kuliah', [MataKuliahController::class, 'getMataKuliah'])->name('prodi-mata-kuliah');
    Route::post('/prodi/mata-kuliah', [MataKuliahController::class, 'addMataKuliah'])->name('add-mata-kuliah');
    Route::get('/admin/user', [UserController::class, 'getUsers'])->name('admin-users');
    Route::post('/admin/user', [UserController::class, 'addUsers'])->name('add-user');
    Route::get('/admin/{id}/edit', [UserController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/{id}/edit', [UserController::class, 'editUser'])->name('admin.edit-user');
    Route::get('/admin/{id}/delete', [UserController::class, 'deleteUser'])->name('admin-delete');
    Route::get('/admin/profile', [ProfileController::class, 'profileAdmin'])->name('admin-profile');
    Route::get('/prodi/profile', [ProfileController::class, 'profileProdi'])->name('prodi-profile');

});

Route::get('/user', [Controller::class, "indexUser"]);
Route::get('/user/mata-kuliah', [MataKuliahController::class, "getMataKuliahUser"])->name('user-mata-kuliah');
Route::get('/user/profile', [ProfileController::class, 'profileUser'])->name('user-profile');
Route::get('/logout', [Controller::class, "logout"]);

