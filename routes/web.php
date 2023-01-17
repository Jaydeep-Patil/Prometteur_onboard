<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChannelController;

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
Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('home');
Route::resource('/clients',App\Http\Controllers\ClientController::class);
Route::resource('/accounts',App\Http\Controllers\AccountController::class);
Route::post('/channel_data',[App\Http\Controllers\ChannelController::class,'channel_data'])->name('channel_data');
Route::get('/get_account',[App\Http\Controllers\AccountController::class,'get_account'])->name('get_account');
Route::post('/process_info',[App\Http\Controllers\AccountController::class,'process_info'])->name('process_info');
Route::post("check_user_login", [FrontController::class, "check_user_login"])->name("check_user_login");
Route::post("country_code", [FrontController::class, "country_code"])->name("country_code");
Route::post("file_data",[App\Http\Controllers\AccountController::class,'file_data'])->name("file_data");
Route::post("get_channels",[FrontController::class,'get_channels'])->name("get_channels");



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/account_details/{id?}', [App\Http\Controllers\AccountController::class, 'account_details'])->name('account_details');

Route::post('/adduser', [App\Http\Controllers\HomeController::class, 'adduser'])->name('adduser');
Route::post('/edituser', [App\Http\Controllers\HomeController::class, 'update'])->name('edituser');
Route::post('/accountlist', [App\Http\Controllers\HomeController::class, 'accountlist'])->name('accountlist');
//Route::post('/adduser', [App\Http\Controllers\HomeController::class, 'adduser'])->name('adduser');

//Added by Jaydeep
Route::post("getLobList", [ChannelController::class, "getLobList"])->name("getLobList"); 
Route::post("getChannelList", [ChannelController::class, "getChannelList"])->name("getChannelList");
Route::post("getCountryList", [ChannelController::class, "getCountryList"])->name("getCountryList");

Route::get('summary_page/{id}', [App\Http\Controllers\AccountController::class, 'summary'])->name('summary');




