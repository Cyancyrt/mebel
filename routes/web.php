<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MebelController;
use Illuminate\Routing\Route as RoutingRoute;

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
//     return view('home/dashboard');
// });
// Route::get('/about', function () {
//     return view('home/about');
// });

Route::get('/', [MebelController::class, 'Index'])->middleware(['guest:user', 'guest:admin'])->name('index');
Route::middleware(['guest:user'])->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/register', [LoginController::class, 'create'])->name('register');
    Route::post('/register', [LoginController::class, 'store'])->name('store');
});
Route::get('/home', [MebelController::class, 'home'])->name('home');
Route::get('/about', [MebelController::class, 'info'])->name('about');
Route::middleware(['auth:user'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/setting-account/{id}/profile', [LoginController::class, 'edit'])->name('setting');
    Route::post('/setting-account/{id}/profile', [LoginController::class, 'update'])->name('settingupdate');
    Route::delete('/setting-account/delete/{id}', [LoginController::class, 'destroy'])->name('delete');
    Route::get('/keranjang', [MebelController::class, 'cart'])->name('cart');
    Route::post('/add-to-cart', [MebelController::class, 'addToCart'])->name('addTo.cart');
    Route::post('/inc/{id}/incres', [MebelController::class, 'inc'])->name('inc');
    Route::post('/dec/{id}/decres', [MebelController::class, 'dec'])->name('dec');
    Route::delete('/del-cart/{id}/delete', [MebelController::class, 'destroy'])->name('del');
    Route::get('/checkout', [MebelController::class, 'check'])->name('check');
    Route::post('/checkout', [MebelController::class, 'checkStore'])->name('checkOrder');
    Route::get('/history', [MebelController::class, 'history'])->name('history');
    Route::post('/produk/{id}/komen', [MebelController::class, 'komenStore'])->name('komen');
});
Route::get('/produk/cari', [MebelController::class, 'cari'])->name('cari');
Route::get('/produk', [MebelController::class, 'produk'])->name('home.produk');
Route::get('/produk/{id}', [MebelController::class, 'detail'])->name('detail');
Route::get('/kategori/{kategori:slug}', [MebelController::class, 'kategori'])->name('kategori');
// Admin
Route::get('/admin-login', [AdminController::class, 'login'])->name('loginAdmin');
Route::post('/admin-login', [AdminController::class, 'authenticate']);
Route::middleware(['auth:admin'])->group(function () {
    Route::post('/admin-logout', [AdminController::class, 'logout'])->name('logoutAdmin');
    Route::get('/admin/index', [AdminController::class, 'index'])->name('index.admin');
    Route::get('/admin/user', [AdminController::class, 'user'])->name('admin.user');
    Route::get('/admin/order', [AdminController::class, 'order'])->name('admin.order');
    Route::get('/admin/produk', [AdminController::class, 'produk'])->name('admin');
    Route::get('/admin/buat/produk', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{id}/delete', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::post('/admin/{id}/order', [AdminController::class, 'status'])->name('status');
    Route::get('/admin/view/kategori', [AdminController::class, 'kategoriView'])->name('kategoriView');
    Route::post('/admin/create/kategori', [AdminController::class, 'kategoriCreate'])->name('kategoriCreate');
    Route::delete('/admin//kategori/{id}/delete', [AdminController::class, 'kategoriDestroy'])->name('kategoriDestroy');
    Route::post('/admin/create/tag', [AdminController::class, 'tagCreate'])->name('tagCreate');
    Route::get('send-mail/{id}/send', [MailController::class, 'index'])->name('send');
});
