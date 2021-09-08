<?php

use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\PesanController;
use App\Http\Livewire\Admin\Artikel;
use App\Http\Livewire\Admin\ArtikelCreate;
use App\Http\Livewire\Admin\ArtikelEdit;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\DetailArtikel;
use App\Http\Livewire\Admin\Pesan;
use App\Http\Livewire\Admin\User;
use App\Http\Livewire\Front\Artikel as FrontArtikel;
use App\Http\Livewire\Front\DetailArtikel as FrontDetailArtikel;
use App\Http\Livewire\Front\Index;
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
// Route::get('/admin', function () {
//     return view('layouts.admin');
// })->middleware('admin');

Route::get('/', Index::class)->name('home-livewire');
Route::get('detail/artikel/{slug}', FrontDetailArtikel::class)->name('detail-artikel');
Route::get('artikel', FrontArtikel::class)->name('artikel-forntend');
Route::get('admin', Dashboard::class)->name('livewire-dashboard');

Route::get('/admin/artikel', Artikel::class)->name('admin-livewire-artikel')->middleware('auth', 'admin');
Route::get('/admin/artikel/create', ArtikelCreate::class)->name('admin-livewire-artikel-create')->middleware('auth', 'admin');
Route::post('/artiekl/store', [ArtikelController::class, 'store'])->name('artikel-store')->middleware('auth', 'admin');
Route::get('/admin/artikel/edit/{slug}', ArtikelEdit::class)->name('livewire-edit-artikel')->middleware('auth', 'admin');
Route::put('/admin/artikel/update/{slug}', [ArtikelController::class, 'update'])->name('update-artikel')->middleware('auth', 'admin');
Route::get('/admin/artikel/detail/{slug}', DetailArtikel::class)->name('livewire-detail-artikel')->middleware('auth', 'admin');

// user
Route::get('/admin/user', User::class)->name('livewire-user')->middleware('auth', 'admin');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('pesan/create', [PesanController::class, 'create'])->name('create-pesan');

// admin pesan
Route::get('admin/pesan', Pesan::class)->name('livewire-pesan')->middleware('auth', 'admin');
