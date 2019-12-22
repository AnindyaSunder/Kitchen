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

Route::get('/',['as'=>'welcome', 'uses'=>'HomeController@index']);
//Route::get('/reservation-create',['as'=>'reservation', 'uses'=>'ReservationController@reserve']);
Route::post('/reservation-create',['as'=>'reservationpost', 'uses'=>'ReservatonController@reservepost']);
Route::post('/contact-create',['as'=>'contactpost', 'uses'=>'ContactController@createcontactpost']);



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout');


Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'Admin'], function(){
	Route::get('/dashboard',['as'=>'dashboard','uses'=>'AdminController@dashboard']);

	//Sliders
	Route::get('/slider-index',['as'=>'sindex','uses'=>'SliderController@sliderindex']);
	Route::get('/slider-create',['as'=>'screate','uses'=>'SliderController@slidercreate']);
	Route::post('/slider-create',['as'=>'screatepost','uses'=>'SliderController@slidercreatepost']);
	Route::get('/slider-edit/{id}/edit',['as'=>'editable','uses'=>'SliderController@editslider']);
	Route::post('/slider-edit/{id}/edit',['as'=>'update','uses'=>'SliderController@updateslider']);
	Route::post('/slider-delete/{id}/delete',['as'=>'deleteable','uses'=>'SliderController@deleteslider']);

	//Categories
	Route::get('/category-show',['as'=>'categoryshow','uses'=>'CategoryController@showcategory']);
	Route::get('/category-create',['as'=>'categorycreate','uses'=>'CategoryController@createcategory']);
	Route::post('/category-create',['as'=>'categorycreatepost','uses'=>'CategoryController@createcategorypost']);
	Route::get('/category-edit/{id}/edit',['as'=>'categoryedit','uses'=>'CategoryController@editcategory']);
	Route::post('/category-edit/{id}/edit',['as'=>'catupdate','uses'=>'CategoryController@updatecategory']);
	Route::post('/category-edit/{id}/delete',['as'=>'categorydelete','uses'=>'CategoryController@deletecategory']);

	//Items
	Route::get('/item-show',['as'=>'itemshow','uses'=>'ItemController@showitem']);
	Route::get('/item-create',['as'=>'itemcreate','uses'=>'ItemController@createitem']);
	Route::post('/item-create',['as'=>'itemcreatepost','uses'=>'ItemController@createitempost']);
	Route::get('/item-edit/{id}/edit',['as'=>'itemedit','uses'=>'ItemController@edititem']);
	Route::post('/item-edit/{id}/edit',['as'=>'itemupdate','uses'=>'ItemController@updateitem']);
	Route::post('/item-delete/{id}/delete',['as'=>'itemdelete','uses'=>'ItemController@deleteitem']);

	//Reservations
	Route::get('/reservation-show',['as'=>'reservationshow','uses'=>'ReservationAdminController@showreserve']);
	Route::post('/reservation-status/{id}/',['as'=>'reservationconfirm','uses'=>'ReservationAdminController@confirmreservation']);
	Route::post('/reservation-delete/{id}/',['as'=>'reservationdelete','uses'=>'ReservationAdminController@deletereservation']);

	//Contacts
	Route::get('/contact-show',['as'=>'contactshow','uses'=>'ContactAdminController@showcontact']);
	Route::get('/contact-details/{id}',['as'=>'contactdetails','uses'=>'ContactAdminController@detailscontact']);
	Route::post('/contact-delete/{id}/',['as'=>'contactdelete','uses'=>'ContactAdminController@deletecontact']);


});



