<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\HomeController;

// Landing Page (Public)
Route::get('/', function () {
    return view('home');
})->name('landing');

// Auth Routes
Auth::routes();

// Dashboard
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Notes Routes (Protected)
Route::resource('notes', NoteController::class);
