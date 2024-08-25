<?php

use Illuminate\Support\Facades\Route;
use App\Filament\Pages\Settings;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::redirect('/', '/admin')->name('login');
Route::redirect('/register', '/admin')->name('register');
