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

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/projects', 'ProjectController@index');
Route::post('/projects', 'ProjectController@create');

Route::post('/create-project', function(){
    App\Project::create(request(['title', 'description']));
    return redirect('/projects');
 })->name('create-project');
