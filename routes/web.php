<?php

use Illuminate\Foundation\Console\RouteCacheCommand;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckStatus;

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


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);

Route::resource('users', 'UserController')->middleware('verified', 'checked');

Route::patch('usrs/{userid}', 'UserController@statusUpdate')->name('statusUpdate')->middleware('verified', 'checked');

Route::patch('usr/{userid}', 'UserController@adminUpdate')->name('adminUpdate')->middleware('verified', 'checked');

Route::resource('products', 'ProductController');

Route::patch('prod/{productid}', 'ProductController@statusUpdate')->name('productStatusUpdate')->middleware('verified', 'checked');

Route::get('/', 'ProductController@welcome')->name('welcome');

Route::get('prod/{productid}', 'ProductController@show')->name('show');