<?php
    use App\http\RotaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rota-dashboard','RotaController@index');
Route::get('/rota','RotaController@create');
Route::post('/add-rota-data','RotaController@store');
Route::get('/rota-planner','RotaController@rota_calender_view');

Route::post('/add-shift-data','RotaController@add_shift_data');

Route::get('/get-all-users','RotaController@get_all_users');
Route::post('/assign_rota_users','RotaController@assign_rota_users');
Route::post('/update_rota_name','RotaController@update_rota_name');
Route::post('/publish_rota_employee','RotaController@publish_rota_employee');
Route::post('/unpublish_rota_employee','RotaController@unpublish_rota_employee');


Route::get('/calender','RotaController@calender_view');
Route::get('/absence/type={id}','RotaController@annual_leave_view');
Route::post('/get-all-users-search','RotaController@get_all_users_search');

Route::post('/delete_rota_employee','RotaController@delete_rota_employee');
Route::get('/edit_rota/{id}','RotaController@edit_rota');
Route::post('/publish_unpublish_rota','RotaController@publish_unpublish_rota');

Route::post('/add-leave','RotaController@add_leave');
Route::post('/date_validation_for_user','RotaController@date_validation_for_user');


Route::get('/pending-request','RotaController@leave_pending');
Route::get('/get_all_leave','RotaController@get_all_leave');
Route::get('/employee','RotaController@employee_view');
Route::post('/get_rota_employee','RotaController@get_rota_employee');
Route::post('/get_all_shift','RotaController@get_all_shift');
Route::post('/edit_shift_data_get','RotaController@edit_shift_data_get');
Route::post('/update-shift-data','RotaController@update_shift_data');
Route::post('/approve_leave','RotaController@approve_leave');
Route::post('/get_leave_record_for_1_week','RotaController@get_leave_record_for_1_week');

Route::post('/get_record_of_rota','RotaController@get_record_of_rota');
Route::get('/get_all_rota_data','RotaController@get_all_rota_data');

