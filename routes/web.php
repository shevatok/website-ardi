<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Routes untuk login

Route::post('/admin/add-user', [AdminController::class, 'addUser'])->name('admin.addUser');

Route::get('/admin/create-user', [AdminController::class, 'createUser'])->name('admin.createUser');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/')->with('success', 'Anda telah berhasil logout.');
})->name('logout');

Route::get('/admin/dashboard', function () {
    // Hanya admin yang bisa mengakses halaman ini
})->middleware('role:admin');

Route::get('/anggota/dashboard', [AnggotaController::class, 'dashboard'])->name('anggota.dashboard');
Route::get('/user/dashboard', [adminController::class, 'dashboard'])->name('user.dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::prefix('anggota')->group(function () {
    Route::get('/', [AnggotaController::class, 'index'])->name('anggota.index');
    Route::get('create', [AnggotaController::class, 'create'])->name('anggota.create');
    Route::post('store', [AnggotaController::class, 'store'])->name('anggota.store');
    Route::get('edit/{anggota}', [AnggotaController::class, 'edit'])->name('anggota.edit');
    Route::put('update/{anggota}', [AnggotaController::class, 'update'])->name('anggota.update');
    Route::delete('destroy/{anggota}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
});

require __DIR__.'/auth.php';
