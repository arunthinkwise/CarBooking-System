<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FleetController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TollManagement;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserManagementController;


Route::get('/',[AuthController::class,'index']);
Route::get('/dashboard',[AuthController::class,'dashboard']);
Route::get('/fleet',[FleetController::class,'index'])->name('admin.fleet');
Route::get('/category',[FleetController::class,'category'])->name('admin.category');
Route::get('/calander',[FleetController::class,'calander'])->name('admin.calander');
Route::post('/vehicle',[FleetController::class,'store'])->name('vehicles.store');
Route::get('/vehicles/list', [FleetController::class, 'list'])->name('vehicles.list');
Route::get('/vehicles/search', [FleetController::class, 'search'])->name('vehicles.search');
Route::get('/vehicles/status_search', [FleetController::class, 'status_search'])->name('vehicles.status_search');
Route::get('/vehicles/category_search', [FleetController::class, 'category_search'])->name('vehicles.category_search');


Route::get('/vehicles/{id}', [FleetController::class, 'show'])->name('vehicles.show'); // for edit fetch
Route::POST('/vehicles/{id}', [FleetController::class, 'update'])->name('vehicles.update'); // for edit submit
Route::delete('/vehicles/{id}', [FleetController::class, 'destroy'])->name('vehicles.destroy');


Route::get('/bookings',[BookingController::class,'index'])->name('admin.bookings');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/search',[BookingController::class,'search'])->name('booking.search');
Route::get('/bookings/status_search',[BookingController::class,'status_search'])->name('booking_status.search');

// Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');



Route::get('/customer',[CustomerController::class,'index'])->name('admin.customers');
Route::get('/customer/fetch', [CustomerController::class, 'fetch']);
Route::post('/customer/store', [CustomerController::class, 'store']);
Route::get('/customer/search', [CustomerController::class, 'search'])->name('customer.search');



Route::get('/customer/show/{id}', [CustomerController::class, 'show']);
Route::post('/customer/update/{id}', [CustomerController::class, 'update']);
Route::delete('/customer/delete/{id}', [CustomerController::class, 'destroy']);

Route::get('/driver_management',[DriverController::class,'index'])->name('admin.driver');
Route::get('/maintenance',[MaintenanceController::class,'index'])->name('admin.maintenance');
Route::get('/report',[ReportController::class,'index'])->name('admin.reports');
Route::get('/user',[UserManagementController::class,'index'])->name('admin.usermanagement');

Route::get('/analy',[AnalyticsController::class,'index'])->name('admin.analytics');


Route::get('/financial',[FinancialController::class,'index'])->name('admin.financials');
Route::get('/payment',[PaymentController::class,'index'])->name('admin.payment');
Route::get('/toll_management',[TollManagement::class,'index'])->name('admin.toll');
Route::get('/setting',[FleetController::class,'index'])->name('admin.setting');
Route::post('/payment/store', [FinancialController::class, 'store'])->name('payment.store');
