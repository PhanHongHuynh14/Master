<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SendmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth;

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

Route::name('admin.')->prefix('admin')->group(function(){
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('mails', SendmailController::class);
});

Route::post("user",[UserAuth::class, 'userLogin']);
Route::view("login",'login');
Route::view("profile",'profile');
Route::get('/logout', function(){
    if(session()->has('user')){
        return redirect('profile');
    }
    return view('login');
});
Route::get('/logout', function(){
    if(session()->has('user')){
        session()->pull('user');
    }
    return redirect('login');
});
