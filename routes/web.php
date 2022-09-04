<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
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

require __DIR__ . '/auth.php';


Route::controller(AdminController::class)->group(function () {
    // Admin Login Route 
    Route::match(['get','post',],'admin/login', 'login');
    // Admin Dashboard Route 

    Route::group(['middleware' => ['admin']], function () {
        Route::get('admin/dashboard', 'dashboard');
        Route::match(['get','post',],'admin/settings/password_update', 'password_update');
        Route::get('admin/logout', 'logout');
    });

    
});
