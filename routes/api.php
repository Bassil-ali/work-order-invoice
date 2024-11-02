<?php
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
// your api is integerated but if you want reintegrate no problem
// to configure jwt-auth visit this link https://jwt-auth.readthedocs.io/en/docs/

Route::group(['middleware' => ['ApiLang', 'cors'], 'prefix' => 'v1', 'namespace' => 'Api\V1'], function () {

	Route::get('/', function () {

	});
	// Insert your Api Here Start //
	Route::group(['middleware' => 'guest'], function () {
		Route::post('login', 'Auth\AuthAndLogin@login')->name('api.login');
		Route::post('register', 'Auth\Register@register')->name('api.register');
	});

	Route::group(['middleware' => 'auth:api'], function () {
		Route::get('account', 'Auth\AuthAndLogin@account')->name('api.account');
		Route::post('logout', 'Auth\AuthAndLogin@logout')->name('api.logout');
		Route::post('refresh', 'Auth\AuthAndLogin@refresh')->name('api.refresh');
		Route::post('me', 'Auth\AuthAndLogin@me')->name('api.me');
		Route::post('change/password', 'Auth\AuthAndLogin@change_password')->name('api.change_password');
		//Auth-Api-Start//
		Route::apiResource("files","FilesApi", ["as" => "api.files"]); 
			Route::post("files/multi_delete","FilesApi@multi_delete"); 
			Route::apiResource("userrole","UserRoleControllerApi", ["as" => "api.userrole"]); 
			Route::post("userrole/multi_delete","UserRoleControllerApi@multi_delete"); 
			Route::apiResource("jobeorders","jobeOrdersApi", ["as" => "api.jobeorders"]); 
			Route::post("jobeorders/multi_delete","jobeOrdersApi@multi_delete"); 
			Route::apiResource("joborders","jobOrdersApi", ["as" => "api.joborders"]); 
			Route::post("joborders/multi_delete","jobOrdersApi@multi_delete"); 
			Route::apiResource("bookfiles","BookFilesControllerApi", ["as" => "api.bookfiles"]); 
			Route::post("bookfiles/multi_delete","BookFilesControllerApi@multi_delete"); 
			Route::apiResource("joborders2","joborders2Api", ["as" => "api.joborders2"]); 
			Route::post("joborders2/multi_delete","joborders2Api@multi_delete"); 
			//Auth-Api-End//
	});
	// Insert your Api Here End //
});