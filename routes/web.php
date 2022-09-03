<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesAssignmentController;
// use Laratrust\Http\Controllers\RolesController;
// use Laratrust\Http\Controllers\PermissionsController;
// use Laratrust\Http\Controllers\RolesAssignmentController;
// namespace Laratrust\Http\Controllers;

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
})->middleware(['auth'])->name('dashboard');


// Route::middleware(['auth','HasPermission'])->group(function () {
Route::middleware(['auth'])->group(function () {

    Route::get('/create',[CheckController::class, 'create']);
    // Route::get('/',[CheckController::class, 'index']);
    // Route::get('/home', [HomeController::class, 'index'])->name('home');

});

// todo: move to here but not working
//not only login but also login as admin
// Route::resource('/permissions', 'PermissionsController', ['as' => 'laratrust'])
//     ->only(['index', 'create', 'store', 'edit', 'update'])->middleware(['role:Admin']);

// Route::resource('/roles', 'RolesController', ['as' => 'laratrust'])->middleware(['role:Admin']);

// Route::resource('/roles-assignment', 'RolesAssignmentController', ['as' => 'laratrust'])
//     ->only(['index', 'edit', 'update'])->middleware(['role:Admin']);



require __DIR__.'/auth.php';
