<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name("welcome");

Auth::routes();

//(home route)  
Route::group(
    ['middleware' => 'CheckUser'],
    function () {

        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/user/changepass', 'HomeController@password')->name('pass');
        Route::post('/user/passchanged', 'HomeController@pass')->name('passuser');

        //delete all table  
        Route::get('/tasks/selectall', 'PendingtaskController@deleteSelected')->name('delete-selected');
        Route::get('/tasks/completed/selectall', 'TaskController@deleteSelected')->name('selectedall');

        //tasks table  
        Route::get('/tasks', 'TaskController@index')->name('tasks');
        Route::get('/tasks/delete/{id}', 'TaskController@delete')->name('deletetask');

        //pending table  
        Route::get('/pending', 'PendingtaskController@index')->name('pending');
        Route::get('/pending/edit/{id}', 'PendingtaskController@edit')->name('editpending');
        Route::post('/pending/update', 'PendingtaskController@saveedit')->name('updatepending');
        Route::get('/pending/create', 'PendingtaskController@create')->name('createpending');
        Route::post('/pending/savenew', 'PendingtaskController@savenew')->name('savepending');
        Route::get('/pending/delete/{id}', 'PendingtaskController@delete')->name('deletepending');
        Route::get('/pending/finish/{id}', 'PendingtaskController@finish')->name('finishtask');
        Route::get('/pending/finishall', 'PendingtaskController@finishall')->name('finishall');
    }
);
