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

Auth::routes();

Route::group(['prefix' => 'partner'], function(){
	//login   
	Route::get('login', 'Partners\Auth\LoginController@showLoginForm')->name('partner.login');
	Route::post('login', 'Partners\Auth\LoginController@login')->name('partner.login');

	//register
	Route::get('register', 'Partners\Auth\RegisterController@showRegisterForm')->name('partner.register');
	Route::post('register', 'Partners\Auth\RegisterController@register')->name('partner.register');
	Route::group(['middleware' => 'auth:partner'], function() {
		//dashboard
    Route::get('dashboard', 'Partners\DashboardController@index')->name('partner.dashboard');
    // logout
    Route::post('logout', 'Partners\Auth\LoginController@logout')->name('partner.logout');
	});
});
	
  

Route::group(['prefix' => 'company'], function(){
	// login
	Route::get('login', 'Companies\Auth\LoginController@showLoginForm')->name('company.login');
	Route::post('login', 'Companies\Auth\LoginController@login')->name('company.login');

	//register
	Route::get('register', 'Companies\Auth\RegisterController@showRegisterForm')->name('company.register');
    Route::post('register', 'Companies\Auth\RegisterController@register')->name('company.register');

	
	Route::group(['middleware' => 'auth:company'], function() {
		// task
		Route::get('/task', 'Companies\TaskController@index')->name('company.task.index');
		Route::get('/task/create', 'Companies\TaskController@create')->name('company.task.create');
        Route::post('/task/create', 'Companies\TaskController@store')->name('company.task.create');
        Route::get('/task/{id}', 'Companies\TaskController@show');
		
		// partner
		Route::get('/partner', 'Companies\PartnerController@index')->name('company.partner.index');
        Route::get('/partner/{id}', 'Companies\PartnerController@show')->name('company.partner.show');
        
        // mail(CompnayUser)
        Route::get('/mail/company-index', 'Companies\CompanyUserMailController@index')->name('company.mail.company-index');
        Route::post('/mail/company-send', 'Companies\CompanyUserMailController@send')->name('company.mail.company-send');

        // mail(Partner)
        Route::get('/mail/partner-index', 'Companies\PartnerMailController@index')->name('company.mail.partner-index');
        Route::post('/mail/partner-send', 'Companies\PartnerMailController@send')->name('company.mail.partner-send');
        
        // logout
		Route::post('logout', 'Companies\Auth\LoginController@logout')->name('company.logout');

	});  
});
