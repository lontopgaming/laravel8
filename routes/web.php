<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlumnusController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserAlumniController;
use App\Http\Controllers\Master\UserController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'hitungalumni']);

Route::get('/profile', function(){
    return view('user.dashboard.profile');
});

// Route::get('/about', function(){
//     return view('user.dashboard.about');
// });

Route::get('/product', function(){
    return view('user.dashboard.product');
});

Route::get('/testimonial', function(){
    return view('user.dashboard.testimonial');
});
Route::get('/galery', function(){
    return view('user.dashboard.galery');
});
Route::get('/email', function(){
    return view('generate.email.register_email');
});

Route::get('/biodata', [BiodataController::class, 'index'])->middleware(['auth', 'alumni']);
Route::post('/biodata', [BiodataController::class, 'store'])->middleware(['auth', 'alumni']);
Route::put('/biodata', [BiodataController::class, 'update'])->middleware(['auth', 'alumni']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'admin']);
Route::post('/admin', [AdminController::class, 'store'])->middleware(['auth', 'admin']);
Route::put('/admin/{id}', [AdminController::class, 'update'])->middleware(['auth', 'admin']);
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->middleware(['auth', 'admin']);

Route::get('/admin/alumni', [AlumnusController::class, 'index'])->middleware(['auth', 'admin']);
Route::delete('/admin/alumni/{id}', [AlumnusController::class, 'destroy'])->middleware(['auth', 'admin']);

Route::get('/admin/chart', [ChartController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('/admin/chart', [ChartController::class, 'hitungalumni'])->middleware(['auth', 'admin']);
// Route::get('/admin/chart', [ChartController::class, 'departemen'])->middleware(['auth', 'admin']);

Route::get('/alumni', [UserAlumniController::class, 'index']);
// Route::get('/coba', [ApiController::class, 'hitungalumni']);




// Admin routes
// Auths
// Route::prefix('login')->group(function () {
//     Route::get('/', [AuthController::class, 'admin']);
//     Route::post('/', [AuthController::class, 'login']);
//     Route::post('/logout', [AuthController::class, 'logout']);
// });

//admin
// Route::prefix('admin')->group(function () {
//     Route::get('/', [AdminController::class, 'index']);
//     Route::post('/', [UserController::class, 'store']);
//     Route::get('/', [AdminController::class, 'alumni']);
// }); 
