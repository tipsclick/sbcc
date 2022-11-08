<?php

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

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

// Login as User
Route::get('/user/backof', 'App\Http\Controllers\Admin\UserController@loginBack')->name('back.of.user');
Route::get('/user/{id}/login', 'App\Http\Controllers\Admin\UserController@loginAs')->name('login.as.user');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
// Admin Routes
Route::group(
    [
        'as'        => 'admin.',
        'namespace' => 'App\Http\Controllers\Admin',
        'prefix'    => 'admin',
        'middleware' => 'auth'
    ],
    function () {
        
        Route::get('users/change-password', 'UserController@password')->name('users.password');
        Route::post('users/change-password', 'UserController@passwordChange');
        Route::resource('users', UserController::class)->middleware(['role:Admin']);
        // Route::resource('users', UserController::class);
        Route::get('roles/prmissions', 'RoleController@permissions')->name('roles.permissions');
        Route::post('roles/prmissions', 'RoleController@permissionsStore');
        Route::resource('roles', RoleController::class);
        Route::resource('tenants', TenantController::class);
    }
);