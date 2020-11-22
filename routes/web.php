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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

//Route for Admin
Route::namespace('Admin')->prefix('admin')->middleware(['auth','auth.admin'])->name('admin.')->group(function(){

    Route::resource('/users', 'UserController',['except' => ['show','store','create']]);

});

//Route to Show Users for admin
Route::get('all/users','Admin\UserController@viewUsers')->name('view.users')->middleware(['auth','auth.admin']);
Route::get('/users/search','Admin\UserController@search')->name('search.users')->middleware(['auth','auth.admin']);


//Route for Profiles 
Route::get('/profiles/all' , 'ProfileController@manageProfiles')->name('profiles.all')->middleware(['auth','auth.admin']);
Route::get('/profile' , 'ProfileController@index')->name('profiles');
Route::get('/profile/create','ProfileController@create')->name('create.profile');
Route::post('/profile/new','ProfileController@store')->name('profile.new');
Route::post('/profile/update/{id}','ProfileController@update')->name('update.profile');
Route::get('/profile/show/{id}','ProfileController@show')->name('show.profile')->middleware(['auth','auth.admin']);


//Route for Services 
Route::get('/services' , 'ServicesController@index')->name('services');
Route::get('/services/all' , 'ServicesController@manageServices')->name('services.all')->middleware(['auth','auth.admin']);
Route::get('/service/create','ServicesController@create')->name('create.service');
Route::post('/service/new','ServicesController@store')->name('service.new');
Route::get('/service/edit/{id}','ServicesController@edit')->name('edit.service');
Route::post('/service/update/{id}','ServicesController@update')->name('update.service');
Route::get('/service/show/{id}','ServicesController@show')->name('show.service')->middleware(['auth','auth.admin']);
Route::get('/service/user/show/{id}','ServicesController@userServiceShow')->name('user.show.service');
Route::get('/service/delete/{id}','ServicesController@destroy')->name('delete.service');
Route::get('/service/search','ServicesController@search')->name('search.service');



//Route for Lessons 
Route::get('/lessons' , 'LessonsController@index')->name('lessons');
Route::get('/lessons/all' , 'LessonsController@manageLessons')->name('lessons.all')->middleware(['auth','auth.admin']);
Route::get('/lesson/create','LessonsController@create')->name('create.lesson');
Route::post('/lesson/new','LessonsController@store')->name('lesson.new');
Route::get('/lesson/show/{id}','LessonsController@show')->name('show.lesson');
Route::get('/lesson/edit/{id}','LessonsController@edit')->name('edit.lesson');
Route::post('/lesson/update/{id}','LessonsController@update')->name('update.lesson');
Route::get('/lesson/delete/{id}','LessonsController@destroy')->name('delete.lesson');
Route::get('/lesson/search','LessonsController@search')->name('search.lesson');


// Route for UI
Route::get('/','UIController@index')->name('index');
Route::get('/our-services','UIController@services')->name('our.services');
Route::get('/programs','UIController@programs')->name('programs');
Route::get('/courses','UIController@courses')->name('our.courses');
Route::get('/lesson/{id}-{slug}','UIController@showLesson')->name('our.lesson');
Route::get('/about','UIController@abouts')->name('about');
Route::get('/contact','UIController@contacts')->name('contacts');
Route::get('/all-lessons/{id}-{slug}','UIController@allLessons')->name('all.lessons.users');


