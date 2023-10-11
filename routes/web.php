<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OTPController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',function(){
    return view('index');
});
Route::post('/sendotp', [OTPController::class, 'sendotp'])->name('sendotp');
Route::get('/otpcheck', [OTPController::class, 'otpcheck'])->name('otpcheck');
Route::post('/otpverification', [OTPController::class, 'otpverify'])->name('otpverification');


