<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DetailTransactionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});
// Route untuk dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk list pengguna
Route::get('/user', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('user');

// Route untuk show daftar pengguna
Route::get('/userView/{user}', [UserController::class, 'show'])->middleware(['auth', 'verified'])->name('userView');

// Route untuk daftar koleksi
Route::get('/koleksi', [CollectionController::class, 'index'])->middleware(['auth', 'verified'])->name('koleksi');

// Route untuk tambah koleksi
Route::get('/koleksiTambah', [CollectionController::class, 'create'])->middleware(['auth', 'verified'])->name('koleksiTambah');

// Route untuk simpan data koleksi
Route::post('/koleksiStore', [CollectionController::class, 'store'])->middleware(['auth', 'verified'])->name('koleksiStore');

// Rpute untuk show koleksi
Route::get('/koleksiView/{collection}', [CollectionController::class, 'show'])->middleware(['auth', 'verified'])->name('koleksiView');


//Update data perubahan koleksi dan user
Route::put('/koleksiUpdate', [CollectionController::class, 'update'])->name('koleksiUpdate');
Route::put('/userUpdate', [UserController::class, 'update'])->name('userUpdate');

//Route untuk list transaksi
Route::get('/transaksi', [TransactionController::class, 'index'])->middleware(['auth', 'verified'])->name('transaksi');

// Route untuk tambah transaksi
Route::get('/transaksiTambah', [TransactionController::class, 'create'])->middleware(['auth', 'verified'])->name('transaksiTambah');

// Route untuk simpan data transaksi
Route::post('/transaksiStore', [TransactionController::class, 'store'])->middleware(['auth', 'verified'])->name('transaksiStore');

// Rpute untuk show transaksi
Route::get('/transaksiView/{transaction}', [TransactionController::class, 'show'])->middleware(['auth', 'verified'])->name('transaksiView');

route::get('/detailTransactionKembalikan/{detailTransactionId}', [DetailTransactionController::class, 'detailTransactionKembalikan'])->name('detailTransactionKembali');
Route::post('/detailTransactionUpdate', [DetailTransactionController::class, 'update'])->name('detailTransactionUpdate');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*NAMA : LESTARI
KELAS: D3IF 46-03
NIM  : 6706223114 */
