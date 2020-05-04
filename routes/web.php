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

Route::get('/',[
    'uses'=>'FrontEndController@index',
    'as'=>'home'
]);

Auth::routes();

Route::get('/test',function(){
    return (App\Donar::where('user_id',auth::id())->first());
});

Route::post('donar/search',[
    'uses'=>'DonarSearchController@search',
    'as'=>'donars.search'

]);

Route::get('/blood/need',[
        'uses'=>'NeedController@need',
        'as'=>'blood.need'
]);
Route::post('/blood/need/save',[
    'uses'=>'NeedController@save',
    'as'=>'need.save'
]);



 
Route::get('/home',[
    'uses'=>'HomeController@index',
    'as'=>'home'
]);


Route::get('/dashboard',[
    'uses'=>'HomeController@dashboard',
    'as'=>'dashboard'
]);


Route::get('/donar/becomedonar',[
    'uses'=>'DonarsController@BecomeDonar',
    'as'=>'donar.show'
]);



Route::post('/login/users',[
        'uses'=>'LoginController@login',
        'as'=>'login.custome'
]);

Route::get('/seeker/blood/request/',[
        'uses'=>'NeedController@requestblood',
        'as'=>'blood.request'

]);

Route::post('/profile/store',[
    'uses'=>'ProfileController@store',
    'as'=>'profile.store'
]);

Route::get('/donar/profile',[
    'uses'=>'ProfileController@index',
    'as'=>'profile.index'
]);

Route::get('/seeker/need/accept/{id}/{need}',[
    'uses'=>'NeedController@needaccept',
    'as'=>'need.accept'
]);

Route::get('/donar/request/view',[
    'uses'=>'NeedController@donarview',
    'as'=>'donar.request.view'
]);

Route::resource('events','EventsController');
Route::resource('settings','SettingsController');

Route::post('/donars/store',[
    'uses'=>'DonarsController@store',
    'as'=>'donars.store'
]);
Route::get('/donars',[
    'uses'=>'DonarsController@index',
    'as'=>'donar'
]);

Route::get('donar/accept/{id}',[
    'uses'=>'DonarsController@restore',
    'as'=>'donars.restore'
]);
Route::post('/donar/delete/{id}',[
    'uses'=>'DonarsController@kill',
    'as'=>'donars.destroy'
]);

Route::get('/all/donars',[
    'uses'=>'DonarsController@alldonar',
    'as'=>'register.donar'
]);
