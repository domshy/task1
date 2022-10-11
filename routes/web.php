<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index');

Route::resource('students', 'StudentController');

Auth::routes();



Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/download-pdf', 'StudentController@downloadPDF');

Route::get('/export-excel', 'StudentController@exportToExcel');
Route::get('/export-csv', 'StudentController@exportIntoCSV');

Route::get('/import-form', 'StudentController@importForm');
Route::post('/import', 'StudentController@import')->name('import');

//charts
Route::get('/charts', 'StudentChartsController@index');

// Route::prefix('admin_access')->middleware(['adminAccess'])->group(function(){
//     Route::get('/',                 [AdminViewController::class, 'chartsView'])->name('adminCharts');
//     Route::get('/student',          [AdminViewController::class, 'studentsView'])->name('AdminStudent');
//     Route::get('/announcement',     [AdminViewController::class, 'announcementView'])->name('AdminAnnouncement');
//     Route::get('/account',          [AdminViewController::class, 'accountView'])->name('AdminAccount');

//     // STUDENT STORE.UPDATE.DELETE
//     Route::post('/student',         [AdminStudentController::class, 'store'])->name('store.student');
//     Route::put('/student/{id}',     [AdminStudentController::class, 'update'])->name('update.student');
//     Route::get('/student/{id}',     [AdminStudentController::class, 'destroy'])->name('detroy.student');

//     // ADMIN STORE.UPDATE.DELETE
//     Route::post('/account',         [AdminController::class, 'store'])->name('store.admin');
//     Route::put('/account/{id}',     [AdminController::class, 'update'])->name('update.admin');
//     Route::get('/account/{id}',     [AdminController::class, 'destroy'])->name('detroy.admin');

//     // ANNOUNCEMENT STORE.UPDATE.DELETE
//     Route::post('/announcement',    [AdminAnnouncementController::class, 'store'])->name('store.announcement');
//     Route::put('/announcement/{id}',    [AdminAnnouncementController::class, 'update'])->name('update.announcement');
//     Route::get('/announcement/{id}', [AdminAnnouncementController::class, 'destroy'])->name('destroy.announcement');

//     // PDF
//     Route::post('/pdf', 'ExportImportController@viewPDF')->name('pdf');
//     // Excel Export
//     Route::get('/export-excel', 'ExportImportController@exportExcel')->name('export-excel');
//     // Excel Import
//     Route::get('/import', 'ExportImportController@importView')->name('importView');
//     Route::post('/import', 'ExportImportController@importFile')->name('import.studentExcel');
// });


// Route::prefix('student_access')->middleware(['studentAccess'])->group(function(){
//     Route::get('/', [UserViewController::class, 'announcementView'])->name('userAnnouncement');
//     Route::get('/profile', [UserViewController::class, 'profileView'])->name('userProfile');
//     Route::put('/profile/{id}', [UserViewController::class, 'profileImage'])->name('changeProfileImage');
// });


// Route::get('/verifyEmail/{token}',[App\Http\Controllers\Admin\AdminStudentController::class,'emailverification']);
