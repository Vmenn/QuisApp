<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Guru\DashboardController;
use App\Http\Controllers\Guru\QuisController;
use App\Http\Controllers\Guru\SoalController;
use App\Http\Controllers\Murid\HomeController;
use App\Http\Controllers\Murid\MuridExampController;


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



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// admin
Route::controller(Admincontroller::class)->group(function () {
    Route::get('/admin/logout',  'AdminDestroy')->name('admin.logout');
});

Route::middleware(['auth', 'guru'])->group(function () {



    // guru Dashboard
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    // guru Quiz
    Route::controller(QuisController::class)->group(function () {
        Route::post('/add', 'store')->name('add.quis');
        Route::get('/quis', 'home')->name('quis');
        Route::get('/lihat/{id}', 'lihat_soal')->name('lihat.soal');
    });

    Route::controller(SoalController::class)->group(function () {
        Route::post('/add', 'store')->name('add.soal');
        Route::get('/create/{id}', 'create')->name('create.soal');
        Route::post('/update', 'update')->name('update.soal');
        Route::get('/edit/{id}', 'edit')->name('edit.soal');
    });
    // guru Quiz

});




Route::middleware(['auth'])->group(function () {
    // murid

    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'index')->name('home');
    });
    Route::controller(MuridExampController::class)->group(function () {
        Route::get('/examp/murid', 'index')->name('examp.murid');
    });
});
