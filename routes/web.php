<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/inq',"AdminDashBoardController@storeInquiries");
//Route::get('/dashboard',function (){
//    return view('dashboard');
//});
Route::get('/dashboard','AdminDashBoardController@dashboard')->name("dashboard");

Route::post('/store','AdminDashBoardController@storeSpecialization')->name('storespeciliazation');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/deletespecialization/{id}','AdminDashBoardController@deletespeciliazation');
Route::post('/edit-specilization/{id}','AdminDashBoardController@editspeciliazation');

Route::post('/store-service','AdminDashBoardController@storeService');
Route::post('/edit-service/{id}','AdminDashBoardController@editservice');
Route::get('/deleteservice/{id}','AdminDashBoardController@deleteservice');

Route::get('/clients-feedback','AdminDashBoardController@clientsFeedback');
Route::post('/store-clientfeedback','AdminDashBoardController@storeClientsFeedback');
Route::post('/edit-feedback/{id}','AdminDashBoardController@editFedback');
Route::get('/delete-feedback/{id}','AdminDashBoardController@deleteFeedback');

Route::get("/career","AdminDashBoardController@employeesApplication");
Route::get('/download-cv/{cvName}', 'AdminDashBoardController@downloadCv');
Route::get("/sortdata",'AdminDashBoardController@sortApplications');
Route::get("/livesearch",'AdminDashBoardController@liveSearch');

//Portfolio Route
//Route::get('/portfolio',function (){
//    return view ('portfolio.create');
//});

//Route::resource('portfolio','PortfolioController');
Route::resource('portfolio','PortfolioController');


//user Dashboard Route start
Route::get('/homepage', 'UserDashBoardController@index')->name('homepage');
Route::post('/store-promotations-contact', 'UserDashBoardController@promotionContactStore');


//Route::get('/homepage',function (){
//    return view ('user.homepage');
//});


