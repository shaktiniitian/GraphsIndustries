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

// Route::get('/', function () {
//     return view('frontend/home');
// });
Route::get('/ip', function(){
    $ip =   \Request::ip();
	// $ip = '14.99.92.146';
    $data = \Location::get($ip);
    return $data;
});

Route::get('/', 'DefaultController@home');
// Route::get('/{url}', 'DefaultController@pageDetail')->name('url');
Route::get('/about', 'DefaultController@about');
Route::get('/about/{slug}', 'DefaultController@aboutPage');
Route::get('/product', function(){
    return view('frontend/products');
})->name('products');
Route::get('/video', function(){
    return view('frontend/videos');
})->name('videos');
Route::get('/about', function(){
    $item = \App\Page::where('type', 8)->first();
    return view('frontend/about', compact('item'));
})->name('about');

Route::get('/faq', function(){
    $item = \App\Page::where('type', 15)->first();
    return view('frontend/faq', compact('item'));
})->name('faq');

Route::get('/contact', function(){
     $item = \App\Page::where('type', 2)->first();
    return view('frontend/contact', compact('item'));
})->name('contact');

Route::post('/save-lead', 'DefaultController@saveLead')->name('save-lead');

Route::get('/product/{id}', 'DefaultController@productDetail');

Auth::routes();

Route::group(['prefix' => 'admin'], function () {

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact/edit/{id}', 'HomeController@editContact');
Route::get('/contact/list', 'HomeController@contactList');
Route::get('/lead', 'HomeController@lead');
Route::patch('/contact-save/{id}', 'HomeController@contactUsStore');
Route::get('/dashboard', 'AdminController@dashboard');
Route::resource('home-slider', 'HomeSliderController');
Route::resource('news', 'NewsController');
Route::resource('page', 'PageController');
Route::resource('content', 'ContentController');
Route::resource('projects', 'ProjectController');
Route::resource('/gallery', 'GalleryController');
Route::resource('/project-gallery', 'ProjectGalleryController');
Route::resource('/category', 'CategoryController');
Route::resource('/files', 'FileController');
Route::get('/post-gallery/{id}', 'GalleryController@pageGallery');

Route::resource('/products', 'ProductController');
Route::resource('/product-gallery', 'ProductGalleryController');
Route::resource('/videos', 'VideoController');


});

