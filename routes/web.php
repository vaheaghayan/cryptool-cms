<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\App;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/{locale}/cms')->group(function () {
    $locale = request()->segment(1);
    if (!in_array(request()->segment(1), ['en', 'am'])) {
//        abort(404);
    }

    App::setLocale($locale);

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\IndexController::class, 'index'])->name('dashboard');
        Route::get('/edit', [\App\Http\Controllers\IndexController::class, 'edit'])->name('create.page');
        Route::get('/edit/{id}', [\App\Http\Controllers\IndexController::class, 'edit'])->name('edit.page');
        Route::post('/store', [\App\Http\Controllers\IndexController::class, 'store'])->name('store');
        Route::post('/delete/{id}', [\App\Http\Controllers\IndexController::class, 'delete'])->name('delete');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
