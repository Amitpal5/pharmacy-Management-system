<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CatagoryController;
use App\Http\Controllers\Admin\SuppilerController;
use App\Http\Controllers\Admin\Purchsingcontroller;
use App\Http\Controllers\Admin\MedicineController;
use App\Http\Controllers\Admin\salescontroller;
use App\Http\Controllers\Admin\Usercontroller;







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


Route::get('/',[FrontendController::class,'index'])->name('fro.home');
Route::get('/redirect',[FrontendController::class,'redirect']);


// Admin//
Route::get('admin/logout',[AdminController::class,'adminlogout'])->name('admin.logout');
Route::get('admin/dashboard',[AdminController::class,'dashboard']);

// Admin Catagory//

Route::get('admin/catagory',[CatagoryController::class,'catagory'])->name('admin.catagory');
Route::post('aaas',[CatagoryController::class,'addcatagory'])->name('admin.addcatagory');
Route::post('bbbs',[CatagoryController::class,'updatecatagory'])->name('admin.updatecatagory');
Route::get('delete/catagory/{id}',[CatagoryController::class,'deletecatagory']);

// Admin Supplier//

Route::get('admin/supplier',[SuppilerController::class,'supplier'])->name('admin.suppiler');
Route::post('cccs',[SuppilerController::class,'addsupplier'])->name('admin.addsuppiler');
Route::post('ddds',[SuppilerController::class,'updatesupplier'])->name('admin.updatesupplier');
Route::get('delete/supplier/{id}',[SuppilerController::class,'deletesupplier']);


// Admin Purchsing//

Route::get('admin/add-purchsing',[Purchsingcontroller::class,'purchsing'])->name('admin.purchsing');
Route::get('/get/supplier_name/{company_name}',[Purchsingcontroller::class,'getname']);
Route::post('ffs',[Purchsingcontroller::class,'addpurchsing'])->name('admin.addpurchsing');
Route::post('hjjk',[Purchsingcontroller::class,'updatepurchsing'])->name('admin.updatepurchsing');
Route::get('admin/purchsing-cash',[Purchsingcontroller::class,'cashlist'])->name('admin.cashlist');
Route::get('admin/purchsing-due',[Purchsingcontroller::class,'duelist'])->name('admin.duelist');
Route::get('admin/purchsing-marked/{id}',[Purchsingcontroller::class,'paymentmarked']);



// Admin Medicine//

Route::get('admin/add-medicine',[MedicineController::class,'medicine'])->name('admin.medicine');
Route::post('tts',[MedicineController::class,'addmedicine'])->name('admin.addmedicine');
Route::get('admin/show-medicine-list',[MedicineController::class,'showmedicine'])->name('admin.showmedicine');
Route::post('ajks',[MedicineController::class,'updatemedicine'])->name('admin.updatemedicine');
Route::get('delete/medicine/{id}',[MedicineController::class,'deletemedicine']);


// Stock Management//
Route::get('admin/add-stock',[MedicineController::class,'stock'])->name('admin.stock');
Route::post('yuus',[MedicineController::class,'updatestock'])->name('admin.updatestock');


// Admin Sales//

Route::get('admin-sales',[salescontroller::class,'sales'])->name('admin.sales');
Route::post('autocomplete',[salescontroller::class,'fetch'])->name('autocomplete.fetch');
Route::get('add/to/product/{id}',[salescontroller::class,'addcart']);
Route::get('/cart',[salescontroller::class,'show_cart'])->name('user.cart');


// Admin User//

Route::get('admin/user',[Usercontroller::class,'user'])->name('admin.user');
Route::post('mmnss',[Usercontroller::class,'adduser'])->name('admin.adduser');
Route::get('admin/show-user',[Usercontroller::class,'showuser'])->name('admin.showuser');

// Admin HR Management//






