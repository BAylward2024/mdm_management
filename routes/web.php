<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DistributionController;

Route::get('/', function () {
    return view('layout');
})->name('home');


Route::get('/operating_system', 'App\Http\Controllers\OSController@index')->name('os');

Route::get('/alias', 'App\Http\Controllers\AliasController@index')->name('alias');
Route::get('/alias/operating_system', 'App\Http\Controllers\AliasController@filter')->name('alias.os');
Route::get('/alias/partner', 'App\Http\Controllers\AliasController@filter')->name('alias.partner');

Route::post('/alias.assign', 'App\Http\Controllers\AliasController@updateAlias')->name('alias.assign');

Route::post('/alias.delete', 'App\Http\Controllers\AliasController@deleteAlias')->name('alias.delete');

Route::get('/distributions', 'App\Http\Controllers\DistributionController@view')->name('distribution');

Route::get('/distributions-filter', 'App\Http\Controllers\DistributionController@filter')->name('distribution-filter');

Route::post('/distributions', 'App\Http\Controllers\DistributionController@addDist')->name('distribution-insert');

Route::post('/distributions-edit', 'App\Http\Controllers\DistributionController@editDist')->name('distribution-edit');

Route::post('/distributions-delete', 'App\Http\Controllers\DistributionController@deleteDist')->name('distribution-delete');

Route::get('/versions', 'App\Http\Controllers\VersionController@view')->name('versions');

Route::get('/editions', 'App\Http\Controllers\EditionController@view')->name('editions');
