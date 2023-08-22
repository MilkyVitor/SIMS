<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegistrarController;
use App\Http\Middleware\AdminMiddleware;

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

Route::get('/', [InquiryController::class, 'showInquiry'])->name('login');
Route::post('/processlogin', [InquiryController::class, 'checkUser']);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/Administrator', [AdminController::class, 'home'])->name('Administrator');
    // Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/logout-admin', [AdminController::class, 'logOut']);
    

});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/Registrar', [RegistrarController::class, 'home'])->name('Registrar');
});

 Route::post('/general-announcements', [InquiryController::class, 'showGeneralAnnouncements']);
Route::post('/general-prog-offered', [InquiryController::class, 'showProgramsOffered']); 



