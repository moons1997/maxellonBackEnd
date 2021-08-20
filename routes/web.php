<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\About;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BanerController;
use \App\Http\Controllers\CarController;
use \App\Http\Controllers\MenuController;
use \App\Http\Controllers\SectionController;
use \App\Http\Controllers\ServicesController;
use \App\Http\Controllers\SaleController;
use \App\Http\Controllers\SectionCardController;
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

//___________Front END

Route::get('/', [IndexController::class, 'index'])->name('main');
Route::get('/about', [About::class, 'index'])->name('about');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');



//___________Front END______Services Navbar
Route::get('/traction-battery-rental',[ServicesController::class, 'traction_battery_rental'])->name('traction-battery-rental');
Route::get('/warehouse-equipment-repair',[ServicesController::class, 'warehouse_equipment_repair'])->name('warehouse-equipment-repair');
Route::get('/training-consultation',[ServicesController::class, 'training_consultation'])->name('training-consultation');
Route::get('/loader-rental',[ServicesController::class, 'loader_rental'])->name('loader-rental');
Route::get('/after-sales-service',[ServicesController::class, 'after_sales_service'])->name('after-sales-service');


//___________Front END______Sale Navbar
Route::get('/sale-of-accumulators',[SaleController::class, 'sale_of_accumulators'])->name('sale-of-accumulators');
Route::get('/installment-of-accumulators',[SaleController::class, 'installment_of_accumulators'])->name('installment-of-accumulators');
Route::get('/test-drive',[SaleController::class, 'test_drive'])->name('test-drive');
Route::get('/sale-of-loader',[SaleController::class, 'sale_of_loader'])->name('sale-of-loader');
Route::get('/loader-installments',[SaleController::class, 'loader_installments'])->name('loader-installments');

// ___________Admin

Auth::routes([
    'register' => false,
]);

//Route::group(['prefix' => '/admin/baner', 'admin' => 'admin.', 'namespace' => 'Admin111', 'middleware' => ['auth']], function (){
//    Route::resource('/admin/baner', BanerController::class);
//});

Route::get('/admin', [HomeController::class, 'index'])->name('home');

Route::resource('/admin/baner', BanerController::class);
Route::resource('/admin/car', CarController::class);
Route::resource('/admin/menu', MenuController::class);
Route::resource('/admin/section', SectionController::class);
Route::resource('/admin/section-card', SectionCardController::class);
