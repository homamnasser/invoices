<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoicesAttachmentsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SectionsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
Auth::routes();
//Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('invoices',InvoicesController::class);
Route::resource('sections',SectionsController::class);
Route::resource('products',ProductsController::class);
Route::resource('InvoiceAttachments',InvoicesAttachmentsController::class);

Route::get('/section/{id}', [InvoicesController::class,'getproducts']);
Route::get('/InvoicesDetails/{id}', [InvoicesDetailsController::class,'edit']);
Route::get('View_file/{invoice_number}/{file_name}', [InvoicesDetailsController::class,'open_file']);
Route::get('download/{invoice_number}/{file_name}',[InvoicesDetailsController::class,'get_file']);
Route::post('delete_file',[InvoicesDetailsController::class,'destroy'])->name('delete_file');
Route::get('/section/{id}', [InvoicesController::class,'getproducts']);
Route::get('/edit_invoice/{id}', [InvoicesController::class,'edit']);




Route::get('/{page}',[AdminController::class,'index'] );

