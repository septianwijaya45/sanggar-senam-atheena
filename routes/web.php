<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\PembayaranPelatihController;
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
    return redirect()->route('login');
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['web', 'auth', 'roles']], function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['roles' => 'Pemilik'], function(){
        // Pelatih
        Route::group(['prefix' => 'Pelatih'], function(){
            Route::get('', [PelatihController::class, 'index'])->name('pelatih');
            Route::get('Add', [PelatihController::class, 'create'])->name('add.pelatih');
            Route::post('Store', [PelatihController::class, 'store'])->name('store.pelatih');
            Route::get('Edit/{id}', [PelatihController::class, 'edit'])->name('edit.pelatih');
            Route::post('Update/{id}', [PelatihController::class, 'update'])->name('update.pelatih');

            Route::delete('Destroy/{id}', [PelatihController::class, 'destroy'])->name('destroy.pelatih');
        });

        // Jadwal
        Route::group(['prefix' => 'Jadwal'], function(){
            Route::get('', [JadwalController::class, 'index'])->name('jadwal');
        });

        // Pembayaran
        Route::group(['prefix' => 'Pembayaran'], function(){
            Route::get('', [PembayaranPelatihController::class, 'index'])->name('pembayaranpelatih');
        });

        // Anggota
        Route::group(['prefix' => 'Anggota'], function(){
            Route::get('', [AnggotaController::class, 'index'])->name('anggota');
        });

        // Event
        Route::group(['prefix' => 'Event'], function(){
            Route::get('', [EventController::class, 'index'])->name('event');
        });
    });
});
