<?php

use App\Http\Controllers\AdmpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PelatihnController;
use App\Http\Controllers\UserController;



// Route::get('/pelatihan', function () {
//     return view('pelatihan');
// });

Route::get('/profile', function () {
    return view('profile');
});

// Route::get('/login', function () {
//     return view('login');
// });

Route::get('/register', function () {
    return view('register');
});

Route::get('/admp', function () {
    return view('admp/admp');
});

Route::get('/coaching', function () {
    return view('coaching/coaching');
});

Route::get('/report-pelatihan', function () {
    return view('report/report_pelatihan');
});

// Route::middleware(['auth'])->group(function () {
//     // Rute-rute yang memerlukan otentikasi disini

//     Route::get('/dashboard', 'DashboardController@index');
//     // Tambahkan rute-rute lain yang memerlukan otentikasi
// });



Route::get('/', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/', [UserController::class, 'loginku']);

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::get('/pelatihan', [PelatihanController::class, 'index'])->name('get.pelatihan');
Route::post('/pelatihan/create', [PelatihanController::class, 'create'])->name('get.pelatihan');
Route::get('/pelatihan/get/{id}', [PelatihanController::class, 'getEdit'])->name('edit.pelatihan');
Route::put('/pelatihan/myedit/{id}', [PelatihanController::class, 'edit'])->name('get.pelatihan');
Route::post('/send-data', [PelatihanController::class, 'send'])->name('send.data');
Route::post('/exporttoword', [PelatihanController::class, 'exportToWord'])->name('export.data');
Route::post('/revisi', [PelatihanController::class, 'revisi'])->name('revisi.pelatihan');
Route::post('/reject', [PelatihanController::class, 'reject'])->name('reject.pelatihan');
Route::post('/delete', [PelatihanController::class, 'delete'])->name('delete.data');
Route::post('/get_user_info', [PelatihanController::class, 'getUserInfo'])->name('get_user_info');
Route::get('/get_user', [PelatihanController::class, 'getUser'])->name('get.user');
Route::get('/pelatihan_pdf', [PelatihanController::class, 'exportPDF']);