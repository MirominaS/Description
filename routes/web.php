<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DescriptionController;
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
})->name('welcome');

Route::get('/description',[DescriptionController::class,'showForm'])->name('description.form');
Route::post('/description/generate',[DescriptionController::class,'generate'])->name('description.generate');