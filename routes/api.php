<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MailController;
use App\Http\Controllers\PriceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::post("send-mail",[loginout::class,'logout']);

Route::post("prix",[MailController::class,'index']);

Route::post("send-mail",[MailController::class,'create']);


Route::post("price",[PriceController::class,'index']);