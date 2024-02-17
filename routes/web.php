<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
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

*/


/*--------------------Admin route start here-------------*/

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'Admin'])->name('admin.home');

    // role route start here 
    Route::get('/roles', [RoleController::class, 'Index'])->name('role.index');
    Route::get('/roles/create', [RoleController::class, 'Create'])->name('role.create');
    Route::post('/roles/store', [RoleController::class, 'Store'])->name('role.store');
    Route::get('/roles/edit/{id}', [RoleController::class, 'Edit'])->name('role.edit');
    Route::post('/roles/update/{id}', [RoleController::class, 'Update'])->name('role.update');
    Route::get('/roles/destroy/{id}', [RoleController::class, 'Destroy'])->name('role.destroy');
    // role route ends here 
    // role route start here 
    Route::get('/user', [UserController::class, 'Index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'Create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'Store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'Edit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'Update'])->name('user.update');
    Route::get('/user/destroy/{id}', [UserController::class, 'Destroy'])->name('user.destroy');
    // role route ends here 
});
/*--------------------Admin route ends here-------------*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
