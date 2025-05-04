<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/mentions-legales', function () {
    return view('mentions');
})->name('mentions.legales');

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    //Get Categories datas
    Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('category.index');

    //Show Category by Id
    Route::get('/categories/show/{id}', 'App\Http\Controllers\CategoryController@show')->name('category.show');

    //Get Categories by Id
    Route::get('/categories/create', 'App\Http\Controllers\CategoryController@create')->name('category.create');

    //Edit Category by Id
    Route::get('/categories/edit/{id}', 'App\Http\Controllers\CategoryController@edit')->name('category.edit');

    //Save new Category
    Route::post('/categories/store', 'App\Http\Controllers\CategoryController@store')->name('category.store');

    //Update One Category
    Route::put('/categories/update/{category}', 'App\Http\Controllers\CategoryController@update')->name('category.update');

    //Update One Category Speedly
    Route::put('/categories/speed/{category}', 'App\Http\Controllers\CategoryController@updateSpeed')->name('category.update.speed');

    //Delete Category
    Route::delete('/categories/delete/{category}', 'App\Http\Controllers\CategoryController@delete')->name('category.delete');

});
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    //Get Realizations datas
    Route::get('/realizations', 'App\Http\Controllers\RealizationController@index')->name('realization.index');

    //Show Realization by Id
    Route::get('/realizations/show/{id}', 'App\Http\Controllers\RealizationController@show')->name('realization.show');

    //Get Realizations by Id
    Route::get('/realizations/create', 'App\Http\Controllers\RealizationController@create')->name('realization.create');

    //Edit Realization by Id
    Route::get('/realizations/edit/{id}', 'App\Http\Controllers\RealizationController@edit')->name('realization.edit');

    //Save new Realization
    Route::post('/realizations/store', 'App\Http\Controllers\RealizationController@store')->name('realization.store');

    //Update One Realization
    Route::put('/realizations/update/{realization}', 'App\Http\Controllers\RealizationController@update')->name('realization.update');

    //Update One Realization Speedly
    Route::put('/realizations/speed/{realization}', 'App\Http\Controllers\RealizationController@updateSpeed')->name('realization.update.speed');

    //Delete Realization
    Route::delete('/realizations/delete/{realization}', 'App\Http\Controllers\RealizationController@delete')->name('realization.delete');

});
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    //Get Users datas
    Route::get('/users', 'App\Http\Controllers\UserController@index')->name('user.index');

    //Show User by Id
    Route::get('/users/show/{id}', 'App\Http\Controllers\UserController@show')->name('user.show');

    //Get Users by Id
    Route::get('/users/create', 'App\Http\Controllers\UserController@create')->name('user.create');

    //Edit User by Id
    Route::get('/users/edit/{id}', 'App\Http\Controllers\UserController@edit')->name('user.edit');

    //Save new User
    Route::post('/users/store', 'App\Http\Controllers\UserController@store')->name('user.store');

    //Update One User
    Route::put('/users/update/{user}', 'App\Http\Controllers\UserController@update')->name('user.update');

    //Update One User Speedly
    Route::put('/users/speed/{user}', 'App\Http\Controllers\UserController@updateSpeed')->name('user.update.speed');

    //Delete User
    Route::delete('/users/delete/{user}', 'App\Http\Controllers\UserController@delete')->name('user.delete');

});
Route::prefix('admin')->name('admin.')->group(function(){

    //Get Abouts datas
    Route::get('/abouts', 'App\Http\Controllers\AboutController@index')->name('about.index');

    //Show About by Id
    Route::get('/abouts/show/{id}', 'App\Http\Controllers\AboutController@show')->name('about.show');

    //Get Abouts by Id
    Route::get('/abouts/create', 'App\Http\Controllers\AboutController@create')->name('about.create');

    //Edit About by Id
    Route::get('/abouts/edit/{id}', 'App\Http\Controllers\AboutController@edit')->name('about.edit');

    //Save new About
    Route::post('/abouts/store', 'App\Http\Controllers\AboutController@store')->name('about.store');

    //Update One About
    Route::put('/abouts/update/{about}', 'App\Http\Controllers\AboutController@update')->name('about.update');

    //Update One About Speedly
    Route::put('/abouts/speed/{about}', 'App\Http\Controllers\AboutController@updateSpeed')->name('about.update.speed');

    //Delete About
    Route::delete('/abouts/delete/{about}', 'App\Http\Controllers\AboutController@delete')->name('about.delete');

});
Route::prefix('admin')->name('admin.')->group(function(){

    //Get Titles datas
    Route::get('/titles', 'App\Http\Controllers\TitleController@index')->name('title.index');

    //Show Title by Id
    Route::get('/titles/show/{id}', 'App\Http\Controllers\TitleController@show')->name('title.show');

    //Get Titles by Id
    Route::get('/titles/create', 'App\Http\Controllers\TitleController@create')->name('title.create');

    //Edit Title by Id
    Route::get('/titles/edit/{id}', 'App\Http\Controllers\TitleController@edit')->name('title.edit');

    //Save new Title
    Route::post('/titles/store', 'App\Http\Controllers\TitleController@store')->name('title.store');

    //Update One Title
    Route::put('/titles/update/{title}', 'App\Http\Controllers\TitleController@update')->name('title.update');

    //Update One Title Speedly
    Route::put('/titles/speed/{title}', 'App\Http\Controllers\TitleController@updateSpeed')->name('title.update.speed');

    //Delete Title
    Route::delete('/titles/delete/{title}', 'App\Http\Controllers\TitleController@delete')->name('title.delete');

});
Route::prefix('admin')->name('admin.')->group(function(){

    //Get Services datas
    Route::get('/service', 'App\Http\Controllers\ServicesController@index')->name('service.index');

    //Show Service by Id
    Route::get('/service/show/{id}', 'App\Http\Controllers\ServicesController@show')->name('service.show');

    //Get Services by Id
    Route::get('/service/create', 'App\Http\Controllers\ServicesController@create')->name('service.create');

    //Edit Service by Id
    Route::get('/service/edit/{id}', 'App\Http\Controllers\ServicesController@edit')->name('service.edit');

    //Save new Service
    Route::post('/service/store', 'App\Http\Controllers\ServicesController@store')->name('service.store');

    //Update One Service
    Route::put('/service/update/{service}', 'App\Http\Controllers\ServicesController@update')->name('service.update');

    //Update One Service Speedly
    Route::put('/service/speed/{service}', 'App\Http\Controllers\ServicesController@updateSpeed')->name('service.update.speed');

    //Delete Service
    Route::delete('/service/delete/{service}', 'App\Http\Controllers\ServicesController@delete')->name('service.delete');

});
Route::prefix('admin')->name('admin.')->group(function(){

    //Get Services datas
    Route::get('/services', 'App\Http\Controllers\ServiceController@index')->name('service.index');

    //Show Service by Id
    Route::get('/services/show/{id}', 'App\Http\Controllers\ServiceController@show')->name('service.show');

    //Get Services by Id
    Route::get('/services/create', 'App\Http\Controllers\ServiceController@create')->name('service.create');

    //Edit Service by Id
    Route::get('/services/edit/{id}', 'App\Http\Controllers\ServiceController@edit')->name('service.edit');

    //Save new Service
    Route::post('/services/store', 'App\Http\Controllers\ServiceController@store')->name('service.store');

    //Update One Service
    Route::put('/services/update/{service}', 'App\Http\Controllers\ServiceController@update')->name('service.update');

    //Update One Service Speedly
    Route::put('/services/speed/{service}', 'App\Http\Controllers\ServiceController@updateSpeed')->name('service.update.speed');

    //Delete Service
    Route::delete('/services/delete/{service}', 'App\Http\Controllers\ServiceController@delete')->name('service.delete');

});