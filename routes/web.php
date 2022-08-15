<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\settingController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\userController;



// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/', [FrontendController::class, 'home'])->name('website.home');
Route::get('/about', [FrontendController::class, 'about'])->name('website.about');
Route::get('/category/{slug}', [FrontendController::class, 'category'])->name('website.category');
Route::get('/post/{slug}', [FrontendController::class, 'post'])->name('website.post');
Route::get('/contact', [FrontendController::class, 'contact'])->name('website.contact');
Route::post('/contact/message', [FrontendController::class, 'message'])->name('website.message');
Route::get('/tag/{slug}', [FrontendController::class, 'tag'])->name('website.tag');





Route::get('/dashboard',[dashboardController::class,'index'])->name('dashboard')->middleware('auth');

Route::prefix('admin')->group(function () {

  

    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);
    Route::resource('post', PostController::class);
    Route::resource('user', userController::class);

    // author user profile
    Route::get('/author/profile', [userController::class, 'profile'])->name('profile');
    Route::put('/update/profile', [userController::class, 'profile_update'])->name('profile.update');

    // setting about 
    Route::get('setting/index',[settingController::class,'index'])->name('setting.index');
    Route::post('setting/update',[settingController::class,'edit'])->name('setting.update');

    // contact
    Route::get('contact/index',[contactController::class,'index'])->name('contact.message');
    Route::get('contact/show{id}',[contactController::class,'show'])->name('contact.show');
    Route::delete('contact/delete{id}',[contactController::class,'destroy'])->name('contact.delete');
});



  







require __DIR__ . '/auth.php';
