<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;
use GuzzleHttp\Middleware;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/report/show', [ReportController::class, 'index'])->name('report.show');
Route::get('/report/create', [ReportController::class, 'create'])->name('report.create');
Route::post('/report/store', [ReportController::class, 'store'])->name('report.store');
Route::get('/report/edit/{report}', [ReportController::class, 'edit'])->name('report.edit');
Route::patch('/report/update/{report}', [ReportController::class, 'update'])->name('report.update');
Route::delete('/report/destroy/{report}', [ReportController::class, 'destroy'])->name('report.destroy');

Route::group(['middleware' => 'role:master_admin'], function() {
    Route::get('/school/show', [SchoolController::class, 'index'])->name('school.show');
    Route::post('/school/store', [SchoolController::class, 'store'])->name('school.store');
    Route::get('/school/show-report/{school}', [SchoolController::class, 'show'])->name('school.report.show');
});