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
    Route::get('/update-master-page', [AdminController::class, 'updateMasterPage'])->name('update-master-page');
    Route::post('/home-data', [AdminController::class, 'getHomeData']);

    Route::post('/updateHomeTab', [AdminController::class, 'updateHomeTab']);
    Route::post('/addAnnouncement', [AdminController::class, 'addAnnouncement']);
    Route::post('/editAnnouncement', [AdminController::class, 'editAnnouncement']);
    Route::post('/deleteAnnouncement', [AdminController::class, 'deleteAnnouncement']);
    Route::post('/announcement-data', [AdminController::class, 'getAnnouncementData']);
    Route::post('/about-data', [AdminController::class, 'getAboutData']);
    Route::post('/editAbout', [AdminController::class, 'editAbout']);

    Route::get('/logout-admin', [AdminController::class, 'logOut']);
    

});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/Registrar', [RegistrarController::class, 'home'])->name('Registrar');
    Route::get('/student-registration', [RegistrarController::class, 'showStudentRegistration']);
    Route::post('/send-registration', [RegistrarController::class, 'sendRegistration']);
});

 Route::post('/general-announcements', [InquiryController::class, 'showGeneralAnnouncements']);
Route::post('/general-prog-offered', [InquiryController::class, 'showProgramsOffered']); 



