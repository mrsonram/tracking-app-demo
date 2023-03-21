<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

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

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/update', [DashboardController::class, 'update'])->name('notes.update');
Route::post('/save', [DashboardController::class, 'store'])->name('notes.store');
Route::get('/notes/{id}', [DashboardController::class, 'show']);
Route::post('/notes/delete', [DashboardController::class, 'destroy'])->name('notes.delete');

// Register
Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store']);

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/forgot-password', [LoginController::class, 'forgot'])->name('forgot-password');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Note
Route::get('/view', [DashboardController::class, 'note_view'])->name('View');
Route::post('/change', [DashboardController::class, 'note_update'])->name('Change');


// Note Management
Route::get('/note', [DashboardController::class, 'note_management'])->name('Note');
