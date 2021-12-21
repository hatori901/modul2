<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Models\Attendances;
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

Route::get('/', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest');


Route::prefix('/dashboard')->middleware(['auth'])->group(function(){
    Route::get('/',[DashboardController::class,'index'])->name("dashboard");
    Route::prefix('/guru')->group(function(){
        Route::get('absen/tambah',[AttendanceController::class,'create'])->name("absen.tambah");
        Route::post('absen/tambah',[AttendanceController::class,'store'])->name('absen.store');
        Route::get('absen/lihat/{id}',[AttendanceController::class,'show'])->name('absen.show');
        Route::get('absen/{id}/hapus',[AttendanceController::class,'destroy'])->name('absen.delete');
        Route::get('absen/{id}/export',[AttendanceController::class,'export'])->name('absen.export');
    });
    Route::prefix('/siswa')->group(function(){
        Route::get('/absen/{id}',[AttendanceController::class,'absen'])->name("siswa.absen");
        Route::post('/absen/{id}',[AttendanceController::class,'update'])->name('siswa.store');
    });
});

require __DIR__.'/auth.php';
