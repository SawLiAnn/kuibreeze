<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/project', function () {
//     return view('project');
// })->middleware(['auth', 'verified'])->name('project');

// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

// Route::resource('projects', ProjectController::class);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::get('roles/del/{id}',[RoleController::class, 'destroy']);

    Route::resource('users', UserController::class);
    Route::get('users/del/{id}',[UserController::class, 'destroy']);

    Route::resource('projects', ProjectController::class);
    Route::get('projects/del/{id}',[ProjectController::class, 'destroy']);
});

require __DIR__ . '/auth.php';
///////////  
  
// Route::get('/home', [HomeController::class, 'index'])->name('home');
  

