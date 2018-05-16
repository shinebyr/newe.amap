<?php

Auth::routes();

Route::get('/', 'User\ListController@guest')->name('guest');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/listings', 'User\ListController@index')->name('listings');
Route::get('/gridview', 'User\ListController@gridView')->name('gridview');
Route::get('/full-width', 'User\ListController@fullWidth')->name('fullwidth');
Route::get('listings/{service}', 'User\ListController@service')->name('service');
Route::post('listings/image-upload/{serviceId}', 'User\ListController@service');
//contact
Route::get('/contact', 'ContactController@create')->name('contact.create');
Route::post('/contact', 'ContactController@store')->name('contact.store');
//USER VIEW Post
Route::get('/blog', 'User\ListController@posts')->name('posts');
Route::get('posts/{post}', 'User\ListController@post')->name('view.post');

Route::get('listings/tag/{tag}', 'User\ListController@tag')->name('tag');
Route::get('listings/category/{category}', 'User\ListController@category')->name('category');
Route::get('listings/city/{city}', 'User\ListController@city')->name('city');

Route::group(['middleware' => 'auth'], function(){
  Route::get('/profile/{slug}', [
    'uses' => 'ProfilesController@index',
    'as' => 'profile'
  ]);

  Route::get('/profile/edit/profile', [
    'uses' => 'ProfilesController@edit',
    'as' => 'profile.edit'
  ]);

  Route::post('/profile/update/profile', [
    'uses' => 'ProfilesController@update',
    'as' => 'profile.update'
  ]);

  Route::resource('/useraddlist', 'User\AddListController');

  Route::resource('review', 'ServiceReviewController');

  Route::post('like', 'User\ListController@saveLike');

});
//Comment
Route::post('comments/store', 'CommentController@store')->name('comments.store');


// ADMIN
Route::group(['prefix' => 'admin'], function () {
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  //Messages
  Route::get('/messages', 'ContactController@index')->name('admin.messages');
  // Route::post('/messages/destroy', 'ContactController@destroy')->name('admin.message.destroy');
  // Route::get('upload', 'Admin\uploadController@index');
  //Users
  Route::resource('users', 'Admin\UserController');
  //List
  Route::resource('addlist', 'Admin\AddListController');
  //post
  Route::resource('post', 'Admin\PostController');
  Route::resource('posttag', 'Admin\TagpostController');
  // Route::get('expired', 'Admin\AddListController@expired')->name('expired');
  Route::get('reviews', 'Admin\AddListController@reviews')->name('addlist.reviews');
  //Gallery
  Route::post('addlist/image-upload/{serviceId}', 'Admin\AddListController@uploadImages');
  Route::get('addlist/delete/{serviceId}', 'Admin\AddListController@deleteImages');
  //Tag
  Route::resource('addtag', 'Admin\TagController');
  //Category
  Route::resource('addcategory', 'Admin\CategoryController');
  //city
  Route::resource('city', 'Admin\CityController');
  //role
  Route::resource('role', 'Admin\RoleController');
  //amenities
  Route::resource('amenity', 'Admin\AmenityController');
  //Price
  Route::resource('price', 'Admin\PriceController');

});


Route::post('/login', 'Auth\LoginController@login')->name('login');

  // Service Profile
//
// Route::group(['middleware' => 'auth'], function(){
//     Route::get('home', function(){
//       return view('home');
//     })->name('home');
//     Route::get('/service', function(){
//       return view('service');
//     })->name('service');
// });
//
// Route::group(['middleware' => 'auth'], function(){
//   Route::get('/service/{slug}', [
//     'uses' => 'ServiceController@index',
//     'as' => 'service'
//   ]);
// });


  //User Profile
