<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\HomeController;

// Landing Page (Public)
Route::get('/', function () {
    return view('welcome');
})->name('landing');

// Auth Routes
Auth::routes();

// Dashboard
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Notes Routes (Protected)
Route::resource('notes', NoteController::class);
