<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::post('/login', 'AuthController@login');



Route::group(['middleware' => ['role:Head of lab']], function () {
    //checks for roles
});
Route::get('/selection', 'SelectionController@selection');
Route::get('/testrecord', 'SelectionController@testrecord');
Route::get('/addtestselection/{test}', 'SelectionController@addtestselection');
Route::get('/testselection/{test}', 'SelectionController@testselection');
Route::group(['middleware' => ['jwt.verify']], function () {

    Route::delete('/user/{id}', 'UsersController@destroy');
    Route::post('/register', 'AuthController@register');
    Route::post('/logout', 'AuthController@logout');

    Route::put('/users/{id}', 'UsersController@update');
    Route::get('/user/{id}', 'UsersController@show');
    Route::get('/usersearch', 'UsersController@search');
    Route::get('/profile', 'AuthController@profile');
    Route::resource('/roles', 'RoleController');

    Route::get('/clients', 'ClientController@index');
    Route::get('/client/{id}', 'ClientController@show');
    Route::post('/client', 'ClientController@store');
    Route::put('/client/{id}', 'ClientController@update');
    Route::delete('/client/{id}', 'ClientController@destroy');

    Route::get('/projects', 'ProjectController@index');
    Route::get('/project/{id}', 'ProjectController@show');
    Route::post('/project', 'ProjectController@store');
    Route::put('/project/{id}', 'ProjectController@update');
    Route::delete('/project/{id}', 'ProjectController@destroy');



    Route::get('/materials', 'MaterialController@index');
    Route::get('/materials/{id}', 'MaterialController@show');
    Route::post('/materials', 'MaterialController@store');
    Route::put('/materials/{id}', 'MaterialController@update');
    Route::delete('/materials/{id}', 'MaterialController@destroy');

    Route::get('/concrete', 'ConcreteController@index');
    Route::get('/concrete/{id}', 'ConcreteController@show');
    Route::post('/concrete', 'ConcreteController@store');
    Route::put('/concrete/{id}', 'ConcreteController@update');
    Route::delete('/concrete/{id}', 'ConcreteController@destroy');

    Route::get('/types', 'TypeController@index');
    Route::get('/type/{id}', 'TypeController@show');
    Route::post('/type', 'TypeController@store');
    Route::put('/type/{id}', 'TypeController@update');
    Route::delete('/type/{id}', 'TypeController@destroy');

    Route::get('/typedescriptions', 'TypeDescriptionController@index');
    Route::get('/typedescription/{id}', 'TypeDescriptionController@show');
    Route::post('/typedescription', 'TypeDescriptionController@store');
    Route::put('/typedescription/{id}', 'TypeDescriptionController@update');
    Route::delete('/typedescription/{id}', 'TypeDescriptionController@destroy');

    Route::get('/grades', 'GradeController@index');
    Route::get('/grade/{id}', 'GradeController@show');
    Route::post('/grade', 'GradeController@store');
    Route::put('/grade/{id}', 'GradeController@update');
    Route::delete('/grade/{id}', 'GradeController@destroy');

    Route::get('/descriptions', 'MixDescriptionController@index');
    Route::get('/description/{id}', 'MixDescriptionController@show');
    Route::post('/description', 'MixDescriptionController@store');
    Route::put('/description/{id}', 'MixDescriptionController@update');
    Route::delete('/description/{id}', 'MixDescriptionController@destroy');

    Route::get('/suppliers', 'SupplierController@index');
    Route::get('/supplier/{id}', 'SupplierController@show');
    Route::post('/supplier', 'SupplierController@store');
    Route::put('/supplier/{id}', 'SupplierController@update');
    Route::delete('/supplier/{id}', 'SupplierController@destroy');

    Route::get('/fractures', 'FractureController@index');
    Route::get('/fracture/{id}', 'FractureController@show');
    Route::post('/fracture', 'FractureController@store');
    Route::put('/fracture/{id}', 'FractureController@update');
    Route::delete('/fracture/{id}', 'FractureController@destroy');

    Route::get('/compressive', 'CompressionTestController@index');
    Route::get('/compressive/{id}', 'CompressionTestController@show');
    Route::post('/compressive', 'CompressionTestController@store');
    Route::put('/compressive/{id}', 'CompressionTestController@update');
    Route::delete('/compressive/{id}', 'CompressionTestController@destroy');

    Route::get('/sand', 'SandTestController@index');
    Route::get('/sand/{id}', 'SandTestController@show');
    Route::post('/sand', 'SandTestController@store');
    Route::put('/sand/{id}', 'SandTestController@update');
    Route::delete('/sand/{id}', 'SandTestController@destroy');

    Route::get('/tasks', 'TaskController@index');
    Route::get('/task/{type}/{id}', 'TaskController@show');
    Route::post('/task', 'TaskController@store');
    Route::put('/task/{id}', 'TaskController@update');
    Route::delete('/task/{id}', 'TaskController@destroy');
});
