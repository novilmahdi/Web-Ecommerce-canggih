<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\EditBaju;
use App\Http\Livewire\Admin\EditSepatu;
use App\Http\Livewire\Admin\EditSepatuProduct;
use App\Http\Livewire\Admin\TambahBaju;
use App\Http\Livewire\Admin\TambahSepatu;
use App\Http\Livewire\Bayar;
use App\Http\Livewire\BelanjaUser;
use App\Http\Livewire\Home;
use App\Http\Livewire\Kontak;
use App\Http\Livewire\ProdukDetail;
use App\Http\Livewire\Store;
use App\Http\Livewire\TambahOngkir;
use App\Http\Livewire\TambahProduk;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', Home::class)->name('home');
Route::get('/tambahproduk', TambahProduk::class);
Route::get('/store', Store::class)->name('store');
Route::get('/belanjauser', BelanjaUser::class);
Route::get('/contact', Kontak::class);


Route::get('/produk-details/{id}', ProdukDetail::class)->name('produk-details');
Route::get('/TambahOngkir/{id}', TambahOngkir::class);
Route::get('/Bayar/{id}', Bayar::class);


// Route Admin
Route::middleware('role:admin')->group(function() {
    
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/tambah-sepatu', TambahSepatu::class)->name('tambah-sepatu');
    Route::get('/tambah-baju', TambahBaju::class)->name('tambah-baju');
    Route::get('/edit-sepatu', EditSepatu::class)->name('editSepatu');
    Route::get('/edit-sepatu-product/{id}', EditSepatuProduct::class)->name('editSepatuProduct');
    Route::get('/edit-baju', EditBaju::class)->name('edit-baju');
});

