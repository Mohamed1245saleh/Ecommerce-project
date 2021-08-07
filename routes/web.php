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



Route::group(["middleware" => ["revalidate"]], function(){


Route::prefix("dashboard")->namespace("backEnd")->middleware(["dashToken"])->group(function(){
    Route::Resource('users' , "Users");
    Route::resource('groups' , "Group");
    Route::resource('students' , "Students");
    Route::resource('tasks' ,'Tasks');
    Route::resource("roles" , "Roles");
    Route::resource("permissions" , "permissions");
});
Route::namespace("backEnd")->group(function(){
    Route::get("logout", "authenticate@logout")->name("logout");
    Route::get("login", "authenticate@login")->name('login');

});
Route::namespace('backEnd')->middleware(['authDashboard'])->group( function() {
       Route::Post("login", "authenticate@postLogin")->name('postLogin');
       Route::get("forgot", "authenticate@forgotPassword")->name("forgot");

});


});
