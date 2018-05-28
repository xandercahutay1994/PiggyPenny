<?php

use App\Notifications\TaskPosted;
use App\Http\Controllers\SystemAdmin\AdminController;



// Auth route
Auth::routes();

// Admin routes
Route::prefix('admin')->group(function(){
	Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'AdminController@index']);
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
});


// Landing Pages Routes
Route::get('/', 'SystemLandingPages\HomePagesController@landing');
Route::get('/about', 'SystemLandingPages\HomePagesController@about');


// Business Routes GET
Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
Route::get('dashboard/{id}', ['as' => 'dashboardId', 'uses' => 'DashboardController@indexID']);


Route::get('/userLogin', ['as' => 'userLogin', 'uses' => 'Auth\LoginController@login'])->name('user.login');
Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/testmail', 'DashboardController@testmail')->name('testmail');
Route::get('/verify/{token}', 'DashboardController@verify')->name('verify');

Route::get('/changePassword', 'Business\MediaController@changePassword');
Route::get('/videoAd/{id}', 'Business\MediaController@videoAd');
Route::get('/photoAd/{id}', 'Business\MediaController@photoAd')->name('photo.submit');
Route::get('/appAd/{id}', 'Business\MediaController@appAd');
Route::get('/surveyAd/{id}', 'Business\MediaController@surveyAd');
Route::get('/account/{id}', 'DashboardController@show')->name('account.show');

// Route::get('/photoAd/{id}/{photoName}', ['as' => 'photoAdTransact', 'uses' => 'Business\MediaController@photoAdTransact']);
Route::get('/photoAd/{id}/{photoName}/{picture}/{extension}', ['as' => 'photoAdTransact', 'uses' => 'Business\BusinessTasksController@index']);
Route::get('/videoAd/{id}/{videoName}/{video}/{extension}', ['as' => 'videoAdTransact', 'uses' => 'Business\BusinessTasksController@indexVideo']);
Route::get('/appAd/{id}/{appName}', ['as' => 'appAdTransact', 'uses' => 'Business\BusinessTasksController@indexApp']);
Route::get('/surveyAd/{id}/{surveyName}', ['as' => 'surveyAdTransact', 'uses' => 'Business\BusinessTasksController@indexSurvey']);


Route::post('/updateAccount/{id}', 'DashboardController@updateAccount');

// POST Routes
Route::post('/photoAd/{id}', ['as' => 'postPhotoTransact', 'uses' => 'Business\BusinessTasksController@store']);
Route::post('/videoAd/{id}',  ['as' => 'postVideoTransact', 'uses' => 'Business\BusinessTasksController@videoUpload']);
Route::post('/appAd/{id}',  ['as' => 'postAppTransact', 'uses' => 'Business\BusinessTasksController@appUpload']);
Route::post('/surveyAd/{id}',  ['as' => 'postSurveyTransact', 'uses' => 'Business\BusinessTasksController@surveyUpload']);


// Route::post('/paymentTransact/{id}/{photoName}', ['as' => 'paymentTransact', 'uses' => 'Business\BusinessTasksController@storePhoto']);
Route::post('/finalTransact/{id}/{photoName}', ['as' => 'finalTransact', 'uses' => 'Business\PaymentsController@store']);
Route::post('/finalVideoTransact/{id}/{videoName}', ['as' => 'finalVideoTransact', 'uses' => 'Business\PaymentsController@storeVideo']);
Route::post('/finalAppTransact/{id}/{appName}', ['as' => 'finalAppTransact', 'uses' => 'Business\PaymentsController@storeApp']);
Route::post('/finalSurveyTransact/{id}/{surveyName}', ['as' => 'finalSurveyTransact', 'uses' => 'Business\PaymentsController@storeSurvey']);

//  API CALL
// Route::get('/taskCompleted/{id}', ['as' => 'taskCompleted', 'uses' => 'Business\BusinessTasksController@showTaskCompleted']);
Route::get('/promotersList', ['as' => 'promotersList', 'uses' => 'Business\BusinessController@promotersList']);

// Update Status
Route::get('deAc_BusinessStatus/{id}', 'AdminController@deAc_BusinessStatus');
Route::get('ac_BusinessStatus/{id}', 'AdminController@ac_BusinessStatus');

// Task Management
Route::get('pendingTaskCompleteLists', ['as' => 'pendingTaskCompleteLists', 'uses' => 'AdminController@pendingTaskCompleteLists']);
Route::get('tasksList', ['as' => 'tasksList', 'uses' => 'AdminController@tasksList']);

// Task Approved Notification
Route::get('approved_task/{btask_id}/{price}','AdminController@approved_task');
Route::get('delete_task/{btask_id}','AdminController@delete_task');

Route::get('notifyAdmin_requestPost', ['as' => 'notifyAdmin_requestPost', 'uses' => 'AdminController@notifyAdmin_requestPost']);

Route::get('notify_approvedTask/{id}', ['as' => 'notify_approvedTask', 'uses' => 'Business\BusinessController@notify_approvedTask']);
Route::get('read_notification/{id}', ['as' => 'read_notification', 'uses' => 'Business\BusinessController@read_notification']);
Route::get('/readAllNotification/{id}', ['as' => 'readAllNotification', 'uses' => 'Business\BusinessController@readAllNotification']);

Route::get('read_notification', ['as' => 'notifyAdmin_requestPost', 'uses' => 'AdminController@notifyAdmin_requestPost']);
Route::get('searchName/{name}', ['as' => 'searchName', 'uses' => 'AdminController@searchName']);
Route::get('seeAllNotification', ['as' => 'seeAllNotification', 'uses' => 'AdminController@seeAllNotification']);




