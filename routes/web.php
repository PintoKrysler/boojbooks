<?php

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

//Controller
Route::get('/', 'PagesController@home');

// Route::get('books', function () {
// 	$books = ['Harry Potter','Fifty Shades of Gray','Magicitians','Eat Pray Love'];
//     return view('pages/books',compact('books'));
// });


// Route::get('books', function () {
// 	$books = ['Harry Potter','Fifty Shades of Gray','Magicitians','Eat Pray Love'];
//     return view('pages/books',compact('books'));
// });
// 

Route::get('books', 'BooksController@index');

Route::get('books/{book}','BooksController@show');

Route::post('books','BooksController@add');

Route::post('books/{book}/reviews','ReviewsController@add');