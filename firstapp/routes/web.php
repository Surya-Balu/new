<?php

use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/galleryone', function () {
    return view('gallery');
});

Route::get('/about/history', function () {
    return view('history');
});

Route::get('/calculator/form', function () {
    return view('calculator.form');
});

Route::get('/calculator/show', function () {
    return view('calculator.show');
});


Route::get('/calculator/result', function () {
    $a=request()->get('a');
    $b=request()->get('b');
    $opr=request()->get('opr');
    $result=null;

    if($opr=='add')
    $result=$a+$b;
    elseif($opr=='sub')
    $result=$a-$b;
    elseif($opr=='mul')
    $result=$a*$b;
    return view('calculator.result')
    ->with('result',$result)
    ->with('a',$a)
    ->with('b',$b)
    ->with('opr',$opr);
});



Route::get('/man/form', function () {
    return view('man.form');
});
Route::get('/man/result', function () {
    $str=request()->get('str');
    $opr=request()->get('opr');
    $result=null;

    if($opr=='str')
    $result=strrev($str);
    elseif($opr=='noofw')
    $result=str_word_count($str);
    elseif($opr=='noofl')
    $result=strlen($str);
    return view('man.result')
    ->with('result',$result)
    ->with('str',$str)
    ->with('opr',$opr);
});



Route::get('/calculator/form', [CalculatorController::class, 'form']);
Route::get('/calculator/result', [CalculatorController::class, 'result']);
Route::get('/calculator/logs', [CalculatorController::class, 'logs']);
Route::get('/calculator/queries', [CalculatorController::class, 'queries']);
Route::get('/calculator/show/{id} ', [CalculatorController::class, 'show']);
Route::get('/calculator/update/{id}', [CalculatorController::class, 'update']);
Route::post('/calculator/savedata/{id}', [CalculatorController::class, 'savedata']);
Route::post('/calculator/destroy/{id}', [CalculatorController::class, 'destroy']);

Route::get('/man/form', [stringController::class, 'form']);
Route::get('/man/result', [stringController::class, 'result']);
Route::get('/man/logs', [stringController::class, 'logs'])->name('man.logs');
Route::get('/man/queries', [stringController::class, 'queries']);
Route::get('/man/show/{id} ', [CalculatorController::class, 'show']);
Route::get('/man/update/{id}', [CalculatorController::class, 'update']);
Route::post('/man/savedata/{id}', [CalculatorController::class, 'savedata']);
Route::post('/man/destroy/{id}', [CalculatorController::class, 'destroy']);

Route::get('/string/form', function () {
});

Route::get('/string/result', function () {
});
