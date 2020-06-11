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
    return view('welcome');
  });
});

Route::middleware(['auth'])->prefix('correspondences')->group(function () {
  Route::get('/', 'CorrespondencesController@index')->name('correspondences.index');
});

Auth::routes([
  'register' => false,
  'reset' => false,
  'verify' => false,
]);

Route::get('/home', 'HomeController@index')->name('home');
