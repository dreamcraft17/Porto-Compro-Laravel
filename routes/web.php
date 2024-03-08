<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisionController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CompanyStructureController;
use App\Http\Controllers\PositionController;


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
    return view('Guest.Index', [
        'title' => 'Home',
        'posts' => Post::query()->where('is_published', true)->latest()->limit(10)->get(),
    ]);
});
Route::get('/about', [GuestController::class, 'index5']);
Route::get('/structure', function () {
    return view('Guest.Structure', [
        'title' => 'Company Structure'
    ]);
});

Route::get('/partner', [GuestController::class, 'index8']);

Route::get('/contact', function () {
    return view('Guest.Contact', [
        'title'=> 'Customer Care'
    ]);
});

Route::get('/Company-Achievement', [GuestController::class, 'index']);
// Route::get('/products', [GuestController::class, 'index1']);
// Route::get('/contactus', [GuestController::class, 'index2']);
Route::get('/careers', [GuestController::class, 'index3']);

Route::get('/informasi/{post:slug}', [GuestController::class, 'show']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);

    Route::get('/daftar', [RegistrationController::class, 'index']);
    Route::post('/daftar', [RegistrationController::class, 'store']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', function () {
        return view('admin.Pages.Index', [
            'title' => 'admin',
        ]);
    });

    Route::get('/admin/informasi/checkSlug', [PostController::class, 'checkSlug']);
    Route::resource('/admin/informasi', PostController::class);
    Route::get('/admin/visi/checkSlug', [VisionController::class,'checkSlug']);
    Route::resource('/admin/visi', VisionController::class);
    Route::get('/admin/misi/checkSlug', [MissionController::class,'checkSlug']);
    Route::resource('/admin/misi', MissionController::class);

    Route::resource('/admin/profil', ProfileController::class)->only(['edit', 'update']);

    Route::post('/admin/logout', [LoginController::class, 'logout']);
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/kategori/checkSlug', [CategoryController::class, 'checkSlug']);
    Route::resource('/admin/kategori', CategoryController::class)->except('show');

    Route::resource('/admin/pengguna', UserController::class)->only(['index', 'edit', 'update']);

    Route::resource('/admin/publikasi', PublishController::class)->only(['index', 'show', 'update']);
});

Route::get('/admin/visi/create', [VisionController::class, 'create'])->name('visi.create');
Route::post('/admin/visi', [VisionController::class, 'store'])->name('visi.store');
Route::delete('/visi/{vision}', [VisionController::class, 'destroy'])->name('visi.destroy');

Route::get('/admin/misi/create', [MissionController::class, 'create'])->name('misi.create');
Route::post('/admin/misi', [MissionController::class, 'store'])->name('misi.store');
Route::delete('/misi/{mission}', [MissionController::class,'destroy'])->name('misi.destroy');
Route::get('mission/{mission}/edit', [MissionController::class,'edit'])->name('misi.edit');
Route::put('mission/{mission}', [MissionController::class,'update'])->name('misi.update');

Route::get('vision/{vision}/edit', [VisionController::class,'edit'])->name('visi.edit');
Route::put('vision/{vision}', [VisionController::class,'update'])->name('visi.update');


Route::get('/admin/testimonies', [TestimonyController::class, 'index'])->name('testimonies.index');
Route::get('/testimonies/{id}', [TestimonyController::class, 'show'])->name('testimonies.show');
Route::post('/testimonies', [TestimonyController::class, 'store'])->name('testimonies.store');
Route::put('/testimonies/{id}', [TestimonyController::class, 'update'])->name('testimonies.update');
Route::delete('/testimonies/{id}', [TestimonyController::class, 'destroy'])->name('testimonies.destroy');
Route::get('/admin/testimonies/create', [TestimonyController::class, 'create'])->name('testimonies.create');
Route::get('/testimonies/{id}/edit', [TestimonyController::class, 'edit'])->name('testimonies.edit');
Route::get('/', [GuestController::class, 'index6'])->name('guest.index');

Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::get('/', [GuestController::class, 'index6'])->name('guest.index');
Route::get('/guest/product', [GuestController::class, 'guestIndex'])->name('guest.product.index');
Route::get('/products', [GuestController::class, 'guestIndex'])->name('guest.products');

Route::get('/admin/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
Route::get('/admin/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::get('/guest/service', [GuestController::class, 'guestIndex2'])->name('guest.service.index');
Route::get('/services', [GuestController::class, 'guestIndex2'])->name('guest.services');

Route::get('/admin/company-structures', [CompanyStructureController::class, 'index'])->name('company_structure.index');
Route::get('/admin/company-structures/create', [CompanyStructureController::class, 'create'])->name('company_structure.create');
Route::post('/admin/company-structures', [CompanyStructureController::class, 'store'])->name('company_structure.store');


Route::get('/admin/positions', [PositionController::class, 'index'])->name('positions.index');
Route::get('/positions/{id}', [PositionController::class, 'show'])->name('positions.show');
Route::post('/positions', [PositionController::class, 'store'])->name('positions.store');
Route::put('/positions/{id}', [PositionController::class, 'update'])->name('positions.update');
Route::delete('/positions/{id}', [PositionController::class, 'destroy'])->name('positions.destroy');
Route::get('/admin/positions/create', [PositionController::class, 'create'])->name('positions.create');
Route::get('/positions/{id}/edit', [PositionController::class, 'edit'])->name('positions.edit');