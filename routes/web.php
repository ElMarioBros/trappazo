<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembersController;

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

//LOGIN
Route::get('/login', fn()=> view('login'))->name('login')->middleware('guest');
Route::post('/login', [MembersController::class,'login'])->name('login-attempt');

Route::post('/logout', [MembersController::class,'logout'])->name('logout');
// FIN LOGIN

// ADMIN
Route::get('/admin', [MembersController::class,'index'])->name('dashboard');

Route::get('/addmember', fn() => view('add-member'))->name('add-member');
Route::post('/addmember', [MembersController::class,'store'])->name('store-member');

Route::get('/profile/{id}', [MembersController::class,'view'])->name('profile');
Route::get('/edit', fn()=> view('edit'))->name('edit');
// FIN ADMIN

// USER
Route::get('/', fn()=> view('my-profile'))->name('my-profile')->middleware('auth');
Route::get('/edit', fn()=> view('edit'))->name('edit')->middleware('auth');

// FIN USER