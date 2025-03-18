<?php

use App\Http\Controllers\AchievementController;
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
use App\Http\Controllers\StructureController;
use App\Http\Controllers\CareerController;



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
Route::get('/structure',[GuestController::class,'guestindex4']);
// Route::get('/structure', function () {
//     return view('Guest.Structure', [
//         'title' => 'Company Structure'
//     ]);
// });

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

Route::get('/admin/companystructures', [CompanyStructureController::class, 'index'])->name('companystructures.index');
Route::get('/companystructures/{id}', [CompanyStructureController::class, 'show'])->name('companystructures.show');
Route::post('/companystructures', [CompanyStructureController::class, 'store'])->name('companystructures.store');
Route::put('/companystructures/{id}', [CompanyStructureController::class, 'update'])->name('companystructures.update');
Route::delete('/companystructures/{id}', [CompanyStructureController::class, 'destroy'])->name('companystructures.destroy');
Route::get('/admin/companystructures/create', [CompanyStructureController::class, 'create'])->name('companystructures.create');
Route::get('/companystructures/{id}/edit', [CompanyStructureController::class, 'edit'])->name('companystructures.edit');
Route::get('/', [GuestController::class, 'index6'])->name('guest.index');
Route::get('/guest/companystructure', [GuestController::class, 'guestIndex'])->name('guest.companystructure.index');
Route::get('/companystructures', [GuestController::class, 'guestIndex'])->name('guest.companystructures');


Route::get('/admin/positions', [PositionController::class, 'index'])->name('positions.index');
Route::get('/positions/{id}', [PositionController::class, 'show'])->name('positions.show');
Route::post('/positions', [PositionController::class, 'store'])->name('positions.store');
Route::put('/positions/{id}', [PositionController::class, 'update'])->name('positions.update');
Route::delete('/positions/{id}', [PositionController::class, 'destroy'])->name('positions.destroy');
Route::get('/admin/positions/create', [PositionController::class, 'create'])->name('positions.create');
Route::get('/positions/{id}/edit', [PositionController::class, 'edit'])->name('positions.edit');

Route::get('/post-images/{filename}', function ($filename) {
    $path = storage_path('app/post-images/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->name('post-images');





Route::get('/admin/achievements', [AchievementController::class, 'index'])->name('achievements.index');
Route::get('/achievements/{id}', [AchievementController::class, 'show'])->name('achievements.show');
Route::post('/achievements', [AchievementController::class, 'store'])->name('achievements.store');
Route::put('/achievements/{id}', [AchievementController::class, 'update'])->name('achievements.update');
Route::delete('/achievements/{id}', [AchievementController::class, 'destroy'])->name('achievements.destroy');
Route::get('/admin/achievements/create', [AchievementController::class, 'create'])->name('achievements.create');
Route::get('/achievements/{id}/edit', [AchievementController::class, 'edit'])->name('achievements.edit');
Route::get('/', [GuestController::class, 'index6'])->name('guest.index');
Route::get('/guest/achievement', [GuestController::class, 'guestIndex3'])->name('guest.achievement.index');
Route::get('/achievements', [GuestController::class, 'guestIndex'])->name('guest.achievements');


Route::get('/admin/structures', [StructureController::class, 'index'])->name('structures.index');
Route::get('/structures/{id}', [StructureController::class, 'show'])->name('structures.show');
Route::post('/structures', [StructureController::class, 'store'])->name('structures.store');
Route::put('/structures/{id}', [StructureController::class, 'update'])->name('structures.update');
Route::delete('/structures/{id}', [StructureController::class, 'destroy'])->name('structures.destroy');
Route::get('/admin/structures/create', [StructureController::class, 'create'])->name('structures.create');
Route::get('/structures/{id}/edit', [StructureController::class, 'edit'])->name('structures.edit');
Route::get('/', [GuestController::class, 'index6'])->name('guest.index');
Route::get('/guest/structure', [GuestController::class, 'guestIndex4'])->name('guest.structure.index');
Route::get('/structures', [GuestController::class, 'guestIndex'])->name('guest.structures');

Route::get('/admin/careers', [CareerController::class, 'index'])->name('careers.index');
Route::get('/careers/{id}', [CareerController::class, 'show'])->name('careers.show');
Route::post('/careers', [CareerController::class, 'store'])->name('careers.store');
Route::put('/careers/{id}', [CareerController::class, 'update'])->name('careers.update');
Route::delete('/careers/{id}', [CareerController::class, 'destroy'])->name('careers.destroy');
Route::get('/admin/careers/create', [CareerController::class, 'create'])->name('careers.create');
Route::get('/careers/{id}/edit', [CareerController::class, 'edit'])->name('careers.edit');
Route::get('/', [GuestController::class, 'index6'])->name('guest.index');
Route::get('/guest/career', [GuestController::class, 'guestIndex5'])->name('guest.career.index');
Route::get('/careers', [GuestController::class, 'guestIndex'])->name('guest.careers');

// Route::get('/search', 'GuestController@search')->name('search');
Route::get('/search', [GuestController::class,'search'])->name('search');
