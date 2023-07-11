<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/calc/{id} ', [CalculatorController::class, 'api']);

//to  get list of users in json format 
Route::get('/users',[UserController::class,'index'])->name('user.index');
// to get one record from  database
Route::get('/users/{id}',[UserController::class,'show'])->name('user.show');
// to create a record 
Route::post('users/create',[UserController::class,'store'])->name('user.create');
//update the record
Route::put('users/{id}',[UserController::class,'update'])->name('user.update');
//delete the record
Route::delete('users/{id}',[UserController::class,'destroy'])->name('user.destroy');

Route::get('/contact', function () 
{
    return view('contact');
});