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
//for creating password
Auth::routes();

Route::group([
     'namespace' => 'Teacher',
     'middleware' => 'auth'
 ], function () {

     Route::get('/', 'DashboardController@index')->name('dashboard.index');

     Route::resources([
       'classes' => 'ClassController',
       'subjects' => 'SubjectController',
       'schedules' => 'ScheduleController',
     ]);

 });
