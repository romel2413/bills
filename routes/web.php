<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::get('/index', function () {
    return view('frontend/index');
});

route::get('/view_category', [AdminController::class,'view_category']);
route::post('/add_category', [AdminController::class,'add_category']);

route::get('/view_record', [AdminController::class,'view_record']);
route::get('/add_record', [AdminController::class,'add_record']);
route::post('/record_add', [AdminController::class,'record_add']);