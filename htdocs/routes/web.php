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

\Illuminate\Support\Facades\Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

/**
 * Projects routes
 */
\Illuminate\Support\Facades\Route::get('/projects', 'ProjectsController@index');
\Illuminate\Support\Facades\Route::get('/projects/{id}', 'ProjectsController@show')->where('id', '[0-9]+');
\Illuminate\Support\Facades\Route::get('/projects/{id}/update', 'ProjectsController@update');
\Illuminate\Support\Facades\Route::get('/projects/{id}/delete', 'ProjectsController@delete');
\Illuminate\Support\Facades\Route::get('/projects/new', 'ProjectsController@new');
\Illuminate\Support\Facades\Route::post('/projects/create', 'ProjectsController@create');

/**
 * Nodes routes
 */
\Illuminate\Support\Facades\Route::get('/nodes', 'NodesController@index');
\Illuminate\Support\Facades\Route::get('/nodes/{id}', 'NodesController@show')->where('id', '[0-9]+');
\Illuminate\Support\Facades\Route::get('/nodes/{id}/update', 'NodesController@update');
\Illuminate\Support\Facades\Route::get('/nodes/{id}/delete', 'NodesController@delete');
\Illuminate\Support\Facades\Route::get('/nodes/new', 'NodesController@new');
\Illuminate\Support\Facades\Route::post('/nodes/create', 'NodesController@create');

/**
 * Jobs routes
 */
\Illuminate\Support\Facades\Route::get('/jobs', 'JobsController@index');
\Illuminate\Support\Facades\Route::get('/jobs/{id}', 'JobsController@show')->where('id', '[0-9]+');
\Illuminate\Support\Facades\Route::get('/jobs/{id}/update', 'JobsController@update');
\Illuminate\Support\Facades\Route::get('/jobs/{id}/delete', 'JobsController@delete');
\Illuminate\Support\Facades\Route::get('/jobs/new', 'JobsController@new');
\Illuminate\Support\Facades\Route::post('/jobs/create', 'JobsController@create');