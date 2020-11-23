<?php

use Illuminate\Support\Facades\Route; 

Auth::routes();


Route::get('/', [App\Http\Controllers\BlogController::class, 'index']);


Route::get('/blogs', 
[App\Http\Controllers\BlogController::class, 'index'])->name('blogs');

// Route::get('/blogs/create', 
// [App\Http\Controllers\BlogController::class, 'create']);
Route::get('/blogs/create', 'App\Http\Controllers\BlogController@create')->name('blogs.create');

Route::post('/blogs/store', 'App\Http\Controllers\BlogController@store')->name('blogs.store');

//keep trashed routes here:
Route::get('/blogs/trash', 'App\Http\Controllers\BlogController@trash')->name('blogs.trash');

Route::get('/blogs/trash/{id}/restore', 'App\Http\Controllers\BlogController@restore')->name('blogs.restore');

Route::delete('/blogs/trash/{id}/permanent-delete', 'App\Http\Controllers\BlogController@permanentDelete')->name('blogs.permanent-delete');



Route::get('/blogs/{id}', 'App\Http\Controllers\BlogController@show')->name('blogs.show');

Route::get('/blogs/{id}/edit', 'App\Http\Controllers\BlogController@edit')->name('blogs.edit');

Route::patch('/blogs/{id}/update', 'App\Http\Controllers\BlogController@update')->name('blogs.update');

Route::delete('/blogs/{id}/delete', 'App\Http\Controllers\BlogController@delete')->name('blogs.delete');

//Admin Routes:
Route::get('/dashboard','App\Http\Controllers\AdminController@index' )->name('dashboard');

Route::get('/admin/blogs','App\Http\Controllers\AdminController@blogs' )->name('admin.blogs')->middleware(['admin', 'auth']);

//Creating a route using Resource:
Route::resource('categories', 'App\Http\Controllers\CategoriesController');

Route::resource('users', 'App\Http\Controllers\UserController');

//contact forms:
Route::get('contact', 'App\Http\Controllers\MailController@contact')->name('contact'); 
Route::post('contact/send', 'App\Http\Controllers\MailController@send')->name('mail.send'); 