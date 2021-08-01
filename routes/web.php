<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});


Route::get('/contact',[ContactController::class,'index']);

Route::get('about',function(){
    return view('about');
})->name('abt');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
//---------------------------Category-------------------------------------------------
Route::get('/category-add',[CategoryController::class,'test'])->name('all.category');
Route::post('category/store',[CategoryController::class,'store'])->name('categoty.store');
Route::get('category/edit/{id}',[CategoryController::class,'edit']);
Route::post('category/update/{id}',[CategoryController::class,'update']);
Route::get('category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

//--------------------------Brand---------------------------------------------------------

Route::get('/brand-add',[BrandController::class,'index'])->name('all.brand');
Route::post('brand/store',[BrandController::class,'store'])->name('brand.store');
Route::get('brand/edit/{id}',[BrandController::class,'edit']);
Route::post('brand/update/{id}',[BrandController::class,'update']);
Route::get('brand/delete/{id}',[Brandcontroller::class,'delete']);
//----------------------------multipic----------------------------------------------------
Route::get('multipic-add',[BrandController::class,'multipic'])->name('multi.pic');