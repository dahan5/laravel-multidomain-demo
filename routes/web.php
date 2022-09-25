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

// Media
// Route::get('/asset/{media}/{conversion?}', MediaViewController::class)->middleware('signed', 'cache.headers:public;max_age=86400;etag')->name('assets.view')->can('view', 'media');
