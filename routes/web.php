<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EbookController;

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
    // Cek apakah pengguna sudah login
    if (auth()->guest()) {
        return redirect()->route('login');  // Redirect ke halaman login jika belum login
    }
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/ebook/{id}', [EbookController::class, 'show'])->name('ebook.show');
    Route::delete('/ebook/{id}', [EbookController::class, 'destroy'])->name('ebook.destroy');
});

require __DIR__ . '/auth.php';
