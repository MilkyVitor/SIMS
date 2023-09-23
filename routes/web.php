<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\StudentController;


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
Route::post('/general-announcements', [InquiryController::class, 'showGeneralAnnouncements']);
Route::post('/general-prog-offered', [InquiryController::class, 'showProgramsOffered']); 


Route::middleware(['auth', 'AdminRestrict'])->group(function () {
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
    Route::post('/addAccount', [AdminController::class, 'addAccount']);
    Route::get('/accounts/{type}', [AdminController::class, 'showAccounts']);

    Route::get('/logout-admin', [AdminController::class, 'logOut']);
});



Route::middleware(['auth', 'RegistrarRestrict'])->group(function () {
    Route::get('/Registrar', [RegistrarController::class, 'home'])->name('Registrar');
    Route::get('/student-registration', [RegistrarController::class, 'showStudentRegistration']);
    Route::post('/send-registration', [RegistrarController::class, 'sendRegistration']);
    Route::get('/details-registration/{id}', [RegistrarController::class, 'detailsRegistration']);
    Route::post('/accept-enrollee', [RegistrarController::class,'acceptEnrollee']);
    Route::get('/announcement', [RegistrarController::class, 'showAnnouncements']);
    Route::post('/addAnnouncement', [RegistrarController::class, 'addAnnouncement']);
    Route::get('/getDataAnn/{id}', [RegistrarController::class, 'getAnnouncementData']);
    Route::post('/update-announcement', [RegistrarController::class, 'updateAnnouncement']);
    Route::post('/remove-announcement', [RegistrarController::class, 'removeAnnouncement']);
    Route::get('/class-manage', [RegistrarController::class, 'showClasses']);
    Route::get('/getSectionStudents/{id}', [RegistrarController::class, 'getSectionStudentsData']);
    Route::get('/getStudentInfo/{id}', [RegistrarController::class, 'getStudentInfo']);
    Route::get('/getScheduleData/{id}', [RegistrarController::class, 'getScheduleData']);
    Route::post('/editSchedule', [RegistrarController::class, 'editSchedule']);
    Route::post('/removeSchedule', [RegistrarController::class, 'removeSchedule']);

});


Route::middleware(['auth', 'CashierOnly'])->group(function () {
    Route::get('/Cashier', [CashierController::class, 'home'])->name('Cashier');
    Route::get('/payment-registration', [CashierController::class, 'showPaymentRegistration'])->name('payment-registration');
    Route::get('/getPRDetails/{id}', [CashierController::class, 'getDetails']);
    Route::post('/mark-paid', [CashierController::class, 'markPaid']);
    
});

Route::middleware(['auth', 'StudentOnly'])->group(function () {
    Route::get('/Student', [StudentController::class, 'home'])->name('Student');
});







