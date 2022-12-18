<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\homeControl;
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
//     return view('welcome');
// });

Route::get("/",[homeControl::class,"index"]);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::get('roles/del/{id}',[RoleController::class, 'destroy']);

    Route::resource('users', UserController::class);
    Route::get('users/del/{id}',[UserController::class, 'destroy']);

    Route::resource('projects', ProjectController::class);
    Route::get('projects/del/{id}',[ProjectController::class, 'destroy']);
});

require __DIR__ . '/auth.php';

  

