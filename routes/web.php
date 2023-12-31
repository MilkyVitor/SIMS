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
Route::get('/pdf-page', [InquiryController::class, 'pdfPage']);
Route::get('/generatePdf', [InquiryController::class, 'generatePdf']);


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
    Route::get('/adminfeedback', [AdminController::class, 'feedback'])->name('feedback');
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
    Route::get('/master-control', [AdminController::class, 'masterControl'])->name('master-control');
    Route::get('/sr-control', [AdminController::class, 'srControl']);
    Route::post('/admin-send-sr', [AdminController::class, 'sendRegistration']);
    Route::get('/prData/{id}', [AdminController::class, 'prData']);
    Route::post('/admin-mark-paid', [AdminController::class, 'markPaid']);
    Route::post('/admin-accept-enrollee', [AdminController::class, 'acceptEnrollee']);
    Route::get('/cs-control', [AdminController::class, 'csControl']);
    Route::post('/adminGetSectionStudents', [AdminController::class, 'getSectionStudents']);
    Route::get('/admingetScheduleData/{id}', [RegistrarController::class, 'getScheduleData']);
    Route::post('/adminEditSchedule', [AdminController::class, 'editSchedule']);
    Route::post('/adminRemoveSchedule', [AdminController::class, 'removeSchedule']);
    Route::get('/gi-control', [AdminController::class, 'giControl']);
    Route::post('/adminSeeStudents', [AdminController::class, 'seeStudents']);
    Route::post('/adminViewGrades', [AdminController::class,'viewGrades']);
    Route::get('/adminGetGrade/{id}', [RegistrarController::class, 'getGrade']);
    Route::post('/adminSetGrade', [AdminController::class, 'setGrade']);
    Route::get('/pa-control', [AdminController::class, 'paControl']);
    Route::post('/adminIssueAdd', [AdminController::class, 'issueAdd']);
    Route::get('/adminGetAdditionalsData/{id}', [CashierController::class, 'getAdditionals']);
    Route::post('/adminEditDetails', [AdminController::class, 'editDetails']);
    Route::post('/adminViewListStudents', [AdminController::class, 'viewListStudents']);
    Route::get('/adminGetname/{id}', [CashierController::class, 'getName']);
    Route::post('/adminSetPaidAdd', [AdminController::class, 'setPaidAdd']);
    Route::get('/an-control', [AdminController::class, 'anControl']);
    Route::get('/adminGetNumber/{id}', [CashierController::class, 'getNumberData']);
    Route::post('/adminEditNumber', [AdminController::class, 'editNumber']);


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
    Route::get('/grade-manage', [RegistrarController::class, 'gradeManage']);
    Route::post('/seeStudents', [RegistrarController::class, 'seeStudents']);
    Route::post('/viewGrades', [RegistrarController::class, 'viewGrades']);
    Route::post('/setGrade', [RegistrarController::class, 'setGrade']);
    Route::get('/getGrade/{id}', [RegistrarController::class, 'getGrade']);
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
    Route::get('/document-request', [StudentController::class, 'documentRequest']);
    Route::get('/promote-gradelevel', [StudentController::class, 'promoteGradelevel']);
    Route::post('/sendRequest', [StudentController::class, 'sendRequest']);
    Route::post('/sendRegistration', [StudentController::class, 'sendRegistration']);
    Route::post('/acknowledgePDF', [StudentController::class, 'acknowledgePDF']);
    Route::get('/feedback', [StudentController::class, 'feedback']);
    Route::post('/sendFeedback', [StudentController::class, 'sendFeedback']);
});







