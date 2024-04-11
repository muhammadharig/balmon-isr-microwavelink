<?php

use App\Http\Controllers\MicrowavelinkController;
use App\Http\Controllers\StatistikController;
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
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function () {
    // controller statistik
    Route::controller(StatistikController::class)->name('statistiks.')->group(function () {
        Route::get('/home', [StatistikController::class, 'dashboardStatistik'])->name('dashboadStatistik');
        Route::get('/menu/statistik/statistik-isr', [StatistikController::class, 'isrStatistik'])->name('isrStatistik');
        Route::get('/menu/statistik/statistik-bhp', [StatistikController::class, 'bhpStatistik'])->name('bhpStatistik');
    });

    // controller users
    Route::controller(UserController::class)->name('users.')->group(function () {
        Route::get('/profile/user/{user}/edit', [UserController::class, 'editProfile'])->name('edit.profile');
        Route::put('/profile/user/{user}/update', [UserController::class, 'updateProfile'])->name('update.profile');
        Route::put('/profile/user/{user}/update-password', [UserController::class, 'updatePasswordProfile'])->name('update.password.profile');
        Route::get('/menu/data-users', [UserController::class, 'index'])->name('index');
        Route::get('/menu/data-users/create', [UserController::class, 'create'])->name('create');
        Route::post('/menu/data-users/store', [UserController::class, 'store'])->name('store');
        Route::get('/menu/data-users/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/menu/data-users/{user}/update', [UserController::class, 'update'])->name('update');
        Route::put('/menu/data-users/{user}/update-password', [UserController::class, 'updatePassword'])->name('update.password');
        Route::delete('/menu/data-users/{user}/destroy', [UserController::class, 'destroy'])->name('destroy');
    });

    // controller microwavelink
    Route::controller(MicrowavelinkController::class)->name('microwavelinks.')->group(function () {
        Route::get('/menu/data-microwavelink', [MicrowavelinkController::class, 'index'])->name('index');
        Route::post('/menu/data-microwavelink/import', [MicrowavelinkController::class, 'import'])->name('import');
        Route::get('/menu/data-microwavelink/{microwavelink}/edit', [MicrowavelinkController::class, 'edit'])->name('edit');
        Route::put('/menu/data-microwavelink/{microwavelink}/update', [MicrowavelinkController::class, 'update'])->name('update');
        Route::delete('/menu/data-microwavelink/{microwavelink}/destroy', [MicrowavelinkController::class, 'destroy'])->name('destroy');
    });

});


