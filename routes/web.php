<?php
use App\Http\Middleware;
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

Route::get('/', function () {
    return view('shop.index');
});
Route::Auth();
Route::group(['middleware' => ['admin']], function () {
	Route::resource('admin/user', 'Admin\UserController');
	Route::resource('admin/manager', 'Admin\AdminController');
	Route::resource('admin/product', 'Admin\ProductController');
});
Route::resource('user/setting','User\MemberController');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::resource('/', 'HomeController');
