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
// use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/books', 'BooksController');
// ->middleware('admin');

Route::get('/books/search', 'BooksController@search');

// Route::get('/books/search', function(Request $request) {
//     $results = App\Book::search($request->search)->get();

//     return view('index', compact('results'));
// });


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
