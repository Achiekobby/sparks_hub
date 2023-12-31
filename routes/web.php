<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\System\PaystackWebhookController;
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
    return view('welcome');
});

Route::post('paystack/web_hook',[PaystackWebhookController::class,"handle"]);
Route::get('paystack/callback',[PaystackWebhookController::class,"callback"]);
