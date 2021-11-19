<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
    return view('productlist');
});
Route::get('/dash/add', function () {
    $data=App\Models\categery::all();
    return view('addproduct')->with('categeries',$data);
});
Route::get('/dash/Plist', function () {
    $data=App\Models\Product::all();
    return view('Plist')->with('plist',$data);
});
Route::get('/dash/Banner', function () {
    return view('Banner');
});
Route::get('/dash/Subcat', function () {
    $data=App\Models\categery::all();
    return view('Subcat')->with('categeries',$data);;
});
Route::post('/dash/product/add',[ProductController::class, 'add']);
Route::post('/dash/subcat/add',[ProductController::class, 'subCatAdd']);
Route::post('/dash/subcatselect',[ProductController::class, 'subcatselect'])->name('subcat.select');