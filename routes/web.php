<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\FeeInvoicesController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GraduateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OnlineClassesController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentAccountController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 });

// -------------------------------------------------------------------------------
// -------- This Route Group Means That Only "guest" can Visit That route --------
// ------------------ The "guest" Is The Member Does Not Log in ------------------

    Route::group(['middleware' => ['guest']] , function(){
        Route::get('/' , [HomeController::class , 'landingPage']) ;
        // Route::get('/gologin', [HomeController::class , 'loginPage']) ;
    }) ;

// --------------------------------------------------------------------------------
// --------------------------------------------------------------------------------


// ------------------------------------------------ contact me --------------------------------------
Route::post('/contact' , [ContactController::class , 'store']) -> name('contact') ;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function(){

    // Route::get('/dashboard', function () {
    //     return view('dashboard')  ;
    // }) -> name('home') ;

    Route::get('/dashboard' , [HomeController::class , 'index']) -> name('home') ;
    // ---------------------------------------------------------------------------------------------------

    // --------------------------------------- GradeController -------------------------------------------
    Route::get('/Grades' , [GradeController::class , 'index']) -> name('Grades.index') ;
    Route::post('/Grades/update' , [GradeController::class , 'update']) -> name('Grades.update') ;
    Route::delete('/Grades/delete' , [GradeController::class , 'destroy']) -> name('Grades.destroy') ;
    Route::post('/Grades/store' , [GradeController::class , 'store']) -> name('Grades.store') ;
    // ---------------------------------------------------------------------------------------------------

    // --------------------------------------- ClassroomController ---------------------------------------
    Route::get('/classroom' , [ClassroomController::class , 'index']) -> name('Classroom.index') ;
    Route::post('/classroom/store' , [ClassroomController::class , 'store']) -> name('Classroom.store') ;
    Route::post('/classroom/update' , [ClassroomController::class , 'update']) -> name('Classroom.update') ;
    Route::delete('/classroom/delete' , [ClassroomController::class , 'destroy']) -> name('Classroom.destroy') ;
    Route::post('/classroom/delete/selected/classrooms' , [ClassroomController::class , 'delete_checkbox']) -> name('Classroom.delete_checkbox') ;
    // ---------------------------------------------------------------------------------------------------

    // --------------------------------------- SectionController ---------------------------------------
    Route::get('/sections/index' , [SectionController::class , 'index']) -> name('Section.index') ;
    Route::post('/sections/store' , [SectionController::class , 'store']) -> name('Section.store') ;
    Route::post('/sections/destroy' , [SectionController::class , 'destroy']) -> name('Section.destroy') ;
    Route::post('/sections/update' , [SectionController::class , 'update']) -> name('Section.update') ;
    // Route::get('classes/{id}' , [SectionController::class , 'getclasses'])  ;
    Route::get('/classes/{id}', 'SectionController@getclasses');
    // ---------------------------------------------------------------------------------------------------

    // ---------------------------------------------- Parents --------------------------------------------
    Route::view('/parents' , 'livewire.show_form') -> name('parents.show_from') ;
    // ---------------------------------------------------------------------------------------------------

    // ---------------------------------------------- Teachers -------------------------------------------
    Route::get('teachers/index' , [TeacherController::class , 'index']) -> name('teachers.index') ;
    Route::get('teachers/add/new/teacher' , [TeacherController::class , 'create']) -> name('teachers.create') ;
    Route::post('teachers/store' , [TeacherController::class , 'store']) -> name('teachers.store') ;
    Route::post('teachers/delete' , [TeacherController::class , 'destroy']) -> name('teachers.destroy') ;
    Route::get('teachers/edit/{id}' , [TeacherController::class , 'edit']) -> name('teachers.edit') ;
    Route::post('teachers/update' , [TeacherController::class , 'update']) -> name('teachers.update') ;
    // ---------------------------------------------------------------------------------------------------

    
    // ---------------------------------------------- Students -------------------------------------------
    Route::resource('students' , StudentController::class) ;
    Route::post('/students/update/{id}' , [StudentController::class , 'update']) -> name('students.update') ;
    Route::post('/students/delete' , [StudentController::class , 'destroy']) -> name('delete') ;
    Route::get('/students/show/informations/{id}' , [StudentController::class , 'show']) -> name('students.show') ;
    Route::post('/students/upload/more/attachements' , [StudentController::class , 'uploadMoreAttachements']) -> name('students.moreAttachements') ;
    Route::get('/download_attachment/{student_name}/{file_name}' , [StudentController::class , 'downloadAttachement']) ;
    Route::post('/delete/attachements' , [StudentController::class , 'deleteAttachement']) -> name('students.deleteAttachements') ;

    //! for ajax's code :
    Route::get('/Get_classrooms/{id}' , [StudentController::class , 'Get_classrooms']) ;
    Route::get('/Get_Sections/{id}' , [StudentController::class , 'Get_Sections']) ;
    // -----------------------------------------------------------------------------------------------------

    // ---------------------------------------------- Promotions -------------------------------------------
    Route::resource('promotions' , PromotionController::class) ;
    Route::post('promotions/store' , [PromotionController::class , 'store']) -> name('promottions.store') ;
    // -----------------------------------------------------------------------------------------------------

    // ---------------------------------------------- Graduate ---------------------------------------------
    Route::resource('/graduate' , GraduateController::class) ;
    // -----------------------------------------------------------------------------------------------------

    // ---------------------------------------------- Fees -------------------------------------------------
    Route::resource('/fees' , FeeController::class) ;
    Route::post('fees/update/{id}' , [FeeController::class , 'update']) -> name('fees.updating') ;
    // -----------------------------------------------------------------------------------------------------

    // ---------------------------------------------- Students Account -------------------------------------
    Route::resource('studentsAccount' , StudentAccountController::class) ;
    // -----------------------------------------------------------------------------------------------------

    // ------------------------------------------------ Fee Invoices ---------------------------------------
    Route::resource('fee_invoices' , FeeInvoicesController::class) ;
    Route::post('fee_invoices/update/{id}' , [FeeInvoicesController::class , 'update']) -> name('fee_invoices.update') ;
    Route::delete('fee_invoices/delete/{id}' , [FeeInvoicesController::class , 'destroy']) -> name('fee_invoices.delete') ;
    // -----------------------------------------------------------------------------------------------------

    // ------------------------------------------------ Receipt  -------------------------------------------
    Route::resource('/receipt' , ReceiptController::class) ;
    // -----------------------------------------------------------------------------------------------------

    // ------------------------------------------------ Payment  -------------------------------------------
    Route::resource('/payment' , PaymentController::class) ;
    // -----------------------------------------------------------------------------------------------------

    // ------------------------------------------------ Pay  -----------------------------------------------
    Route::resource('/pay' , PayController::class) ;
    // -----------------------------------------------------------------------------------------------------

    // ------------------------------------------------ Attendance  ----------------------------------------
    Route::resource('/attendance' , AttendanceController::class) ;
    // -----------------------------------------------------------------------------------------------------

    // ------------------------------------------------ Subject  ----------------------------------------
    Route::resource('/subject' , SubjectController::class) ;
    // -----------------------------------------------------------------------------------------------------

    // ------------------------------------------------ Exam  ---------------------------------------------
    // Route::resource('/exam' , ExamController::class) ;
    // -----------------------------------------------------------------------------------------------------
        
    // ------------------------------------------------ Quiz  ----------------------------------------
    Route::resource('/quiz' , QuizController::class) ;
    Route::get('/show/{teacher_name}/{file_name}' , [QuizController::class , 'showFile']) ;
    // -----------------------------------------------------------------------------------------------

    // ------------------------------------------------ Zoom  ----------------------------------------------
    Route::resource('/onlineclasses' , OnlineClassesController::class) ;
    Route::get('/indirect' , [OnlineClassesController::class , 'create_indirect']) -> name('indirect') ;
    Route::post('/store/indirect' , [OnlineClassesController::class , 'store_indirect']) -> name('store.indirect') ;
    // -----------------------------------------------------------------------------------------------------
  
    // ------------------------------------------------ Book  ----------------------------------------------
    Route::resource('/library' , BookController::class) ;
    Route::get('/download/{file_name}' , [BookController::class , 'download']) -> name('library.download') ;
    Route::get('/show/{file_name}' , [BookController::class , 'show']) -> name('library.show') ;
    // -----------------------------------------------------------------------------------------------------

    // ------------------------------------------------ Settings  ------------------------------------------
    Route::resource('/settings' , SettingController::class) ;
    // -----------------------------------------------------------------------------------------------------

    // ------------------------------------------------ Events ------------------------------------------
    Route::resource('/events' , EventController::class) ;
    // --------------------------------------------------------------------------------------------------

    // ------------------------------------------------ contact me --------------------------------------
    Route::get('/messages' , [ContactController::class , 'index']) -> name('show_all_messages') ;
    Route::post('/messages/delete/{id}' , [ContactController::class , 'destroy']) -> name('delete_messages') ;
    Route::get('/messages/show/{id}' , [ContactController::class , 'show']) -> name('show_messages') ;
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');


// ---------------------- Forgot password ---------------------------
        Route::get('/forget/password' , function (){
            return view('auth.forgot-password');
        })  -> name('forgot-password');
// ------------------------------------------------------------------





