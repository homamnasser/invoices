<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceAchiveController;
use App\Http\Controllers\InvoicesAttachmentsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

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
Route::get('/Status_show/{id}', [InvoicesController::class,'show'])->name('Status_show');
Route::post('/Status_Update/{id}', [InvoicesController::class,'Status_Update'])->name('Status_Update');
Route::get('Invoice_Paid',[InvoicesController::class,'Invoice_Paid']);
Route::get('Invoice_UnPaid',[InvoicesController::class,'Invoice_UnPaid']);
Route::get('Invoice_Partial',[InvoicesController::class,'Invoice_Partial']);
Route::resource('Archive', InvoiceAchiveController::class);
Route::get('Print_invoice/{id}',[InvoicesController::class,'Print_invoice']);
Route::get('export_invoices', [InvoicesController::class, 'export']);
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);
});













Route::get('/{page}',[AdminController::class,'index'] );

