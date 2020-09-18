<?php

use Illuminate\Support\Facades\Route;

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


Route::resource('/article', 'Article');
Route::resource('/category', 'category');
Route::get('/bar',function(){
    return view('bar')->with('toto',"test");
});
Route::get('/foo',function(){
    return view('foo')->with('toto',"coucou");
});
Route::get('/{any}',function () {
	return redirect()->route('article.index');
})->where('any', '.*');


