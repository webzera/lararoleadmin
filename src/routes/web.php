<?php

$namespace = 'Webzera\Lararoleadmin\HTTP\Controllers';

Route::group(['middleware' => ['web'], 'namespace' => $namespace, 'prefix' => 'admin'], function(){
	
	Route::get('/', 'LaradminController@index')->name('admin::home');

	Route::GET('/login','LoginController@showLoginForm')->name('admin::login')->middleware('web'); //use middleware otherwise not workink

	Route::POST('/login','LoginController@login')->middleware('web');

	Route::GET('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('admin::password.request')->middleware('web');

	Route::POST('password/email','ForgotPasswordController@sendResetLinkEmail')->name('admin::password.email');

	Route::POST('/password/reset','ResetPasswordController@reset')->name('admin::password.update');

	Route::GET('password/reset/{token}','ResetPasswordController@showResetForm')->name('admin::password.reset');

	Route::resource('slider', 'SliderController');

	Route::resource('page', 'PageController');

	Route::resource('adminuser', 'AdminuserController');

	///////////////////////////////////////////////////////////////

//admin role
Route::get('adminrolelist', 'RoleController@adminrolelist')->name('admin::adminrolelist');
Route::get('createroleform', 'RoleController@createroleform')->name('admin::createroleform');
Route::post('createrolestore', 'RoleController@createrolestore')->name('admin::createrolestore');
Route::post('roleassign', 'RoleController@roleassign')->name('admin::roleassign');

//admin permission
Route::post('permissionassign', 'PermissionController@permissionassign')->name('admin::permissionassign');
Route::get('adminpermissionlist', 'PermissionController@adminpermissionlist')->name('admin::adminpermissionlist');

//Notification
Route::GET('notification/allnotify','NotificationController@allnotify')->name('admin::allnotify');
Route::GET('notification/viewnotify/{id}','NotificationController@viewnotify')->name('admin::viewnotify');

//send sms
Route::post('smssendall', 'AdminController@smssendall')->name('admin::smssendall');
Route::post('sendsinglesms', 'AdminController@sendsinglesms')->name('admin::sendsinglesms');
	 
});

