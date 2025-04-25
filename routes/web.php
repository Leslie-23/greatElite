<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\RegistrationController;


Route::get('/', function () {

    $person = [
        "name"=> "Leslie",
        "email" => "leslie@gmail.com"
    ];
    // dump($person);
    // dd($person);

    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

Route::get('/about', function(){
    return view('about');
});

Route::get('/register-1', [RegistrationController::class, 'show'])->name('register.show');
Route::post('/register-1', [RegistrationController::class, 'register'])->name('register.submit');

Route::view('/register-1/success', 'registration_success')->name('register.success');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
