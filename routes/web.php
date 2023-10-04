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
    Route::get('/control-panel', [AdminController::class, 'controlPanel'])->name('control-panel');
    Route::post('/toggle', [AdminController::class, 'toggle']);
    Route::get('/feedback', [AdminController::class, 'feedback'])->name('feedback');
    Route::get('/getfeedbackdata/{id}', [AdminController::class, 'getFeedbackData']);
    Route::post('/acknowledge', [AdminController::class, 'acknowledgeFeedback']);
    Route::get('/class-management', [AdminController::class, 'classManagement'])->name('class-management');
    Route::get('/getgradeData/{id}', [AdminController::class, 'getgradeData']);
    Route::post('/activateGrade', [AdminController::class, 'activateGrade']);
    Route::get('/getsubjectData/{id}', [AdminController::class, 'getsubjectData']);
    Route::post('/editSubject', [AdminController::class, 'editSubject']);
    Route::post('/deleteSubject', [AdminController::class, 'deleteSubject']);
    Route::get('/getroomsData/{id}', [AdminController::class, 'getRoomsData']);
    Route::post('/editRoom', [AdminController::class, 'editRoom']);
    Route::post('/removeRoom', [AdminController::class, 'removeRoom']);
    Route::get('/academic-records', [AdminController::class, 'academicRecords'])->name('academic-records');
    Route::post('/searchRecords', [AdminController::class, 'searchRecords']);
    


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
    Route::post('/getSectionStudents', [RegistrarController::class, 'getSectionStudentsData']);
    Route::get('/getStudentInfo/{id}', [RegistrarController::class, 'getStudentInfo']);
    Route::get('/getScheduleData/{id}', [RegistrarController::class, 'getScheduleData']);
    Route::post('/editSchedule', [RegistrarController::class, 'editSchedule']);
    Route::post('/removeSchedule', [RegistrarController::class, 'removeSchedule']);
    Route::get('/document-requests', [RegistrarController::class, 'documentRequests']);
    Route::post('/getDocumentsList', [RegistrarController::class, 'getDocumentLists']);
    Route::post('/acknowledgedocs', [RegistrarController::class, 'acknowledgeDocs']);

});


Route::middleware(['auth', 'CashierOnly'])->group(function () {
    Route::get('/Cashier', [CashierController::class, 'home'])->name('Cashier');
    Route::get('/payment-registration', [CashierController::class, 'showPaymentRegistration'])->name('payment-registration');
    Route::get('/getPRDetails/{id}', [CashierController::class, 'getDetails']);
    Route::post('/mark-paid', [CashierController::class, 'markPaid']);
    Route::get('/payment-management', [CashierController::class, 'paymentManagement'])->name('payment-management');
    Route::post('/getLists', [CashierController::class, 'getLists']);
    Route::post('/getInformation', [CashierController::class, 'getInformation']);
    Route::get('/getTransactData/{id}', [CashierController::class, 'getTransactData']);
    Route::post('/setPaid', [CashierController::class, 'setPaid']);
    Route::get('/payment-additionals', [CashierController::class, 'paymentAdditionals'])->name('payment-additionals');
    Route::get('/getAdditionalsData/{id}', [CashierController::class, 'getAdditionals']);
    Route::post('/viewListStudents', [CashierController::class, 'viewListStudents']);
    Route::get('/getname/{id}', [CashierController::class, 'getName']);
    Route::post('/setPaidAdd', [CashierController::class, 'setPaidAdd']);
    Route::post('/issueAdd', [CashierController::class, 'issueAdd']);
    Route::post('/editDetails', [CashierController::class, 'editDetails']);
    Route::get('/account-numbers', [CashierController::class, 'accountNumbers'])->name('account-numbers');
    Route::get('/getNumber/{id}', [CashierController::class, 'getNumberData']);
    Route::post('/editNumber', [CashierController::class, 'editNumber']);
    Route::post('/deleteNumber', [CashierController::class, 'deleteNumber']);

    
});

Route::middleware(['auth', 'StudentOnly'])->group(function () {
    Route::get('/Student', [StudentController::class, 'home'])->name('Student');
    Route::get('/schedule', [StudentController::class, 'schedule']);
    Route::get('/payment-records', [StudentController::class, 'paymentRecords']);
    Route::get('/getTransactionDetails/{id}', [StudentController::class, 'getTransactionDetails']);
    Route::post('/sendReceipt', [StudentController::class, 'sendReceipt']);
    Route::get('/grades-view', [StudentController::class, 'gradesView']);
});







