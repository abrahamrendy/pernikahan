<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PDFController;

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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/data/{type}', [App\Http\Controllers\DataController::class, 'index'])->name('data');
Route::get('/get_mempelai/{id}', [App\Http\Controllers\DataController::class, 'getMempelai']);
Route::get('/get_pemberkatan/{id}', [App\Http\Controllers\DataController::class, 'getPemberkatan']);

Route::post('/submit', [App\Http\Controllers\DataController::class, 'submit']);
Route::post('/verify', [App\Http\Controllers\DataController::class, 'verify']);
Route::post('/decline', [App\Http\Controllers\DataController::class, 'decline']);


Route::post('/edit', [App\Http\Controllers\DataController::class, 'submitEditPemberkatan'])->name('submitEditPemberkatan');
Route::post('/edit-details', [App\Http\Controllers\DataController::class, 'submitEditDetails'])->name('submitEditDetails');


// Route for view/blade file.
Route::get('importExportView', [ExcelController::class, 'importExportView'])->name('importExportView');
// Route for export/download tabledata to .csv, .xls or .xlsx
Route::get('exportExcel/{type}', [ExcelController::class, 'exportExcel'])->name('exportExcel');
// Route for import excel data to database.
Route::post('importExcel', [ExcelController::class, 'importExcel'])->name('importExcel');

Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
Route::get('view', [PDFController::class, 'view']);



