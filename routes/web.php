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

Route::middleware(['auth'])->prefix('/')->group(function () {
  Route::get('/', function () {
    return redirect()->route('correspondences.index');
  });
});

Route::middleware(['auth'])->prefix('correspondences')->group(function () {
  Route::get('/', 'CorrespondencesController@index')->name('correspondences.index');
  Route::get('/create', 'CorrespondencesController@create')->name('correspondence.create');
  Route::post('/create/save', 'CorrespondencesController@save')->name('correspondence.save');
  Route::post('/search', 'CorrespondencesController@search')->name('correspondence.search');
  Route::get('/delete/{id}', 'CorrespondencesController@delete')->name('correspondence.delete');
  Route::get('/edit/{id}', 'CorrespondencesController@edit')->name('correspondence.edit');
  Route::post('/edit/save', 'CorrespondencesController@saveEdit')->name('correspondence.edit.save');
});

Auth::routes([
  'register' => false,
  'reset' => false,
  'verify' => false,
]);

Route::get('/home', 'HomeController@index')->name('home');
