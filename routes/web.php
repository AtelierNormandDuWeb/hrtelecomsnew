<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\CardsDisplayController;

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


Route::get('/mentions-legales', fn() => view('mentions-legales'))->name('mentions-legales');

Route::get('/confidentialite', fn() => view('confidentialite'))->name('confidentialite');

Route::get('/cookiesview', fn() => view('cookiesview'))->name('cookiesview');

Route::get('/ourservices', fn() => view('ourservices'))->name('ourservices');

Route::get('/trombinoscope', [CardsDisplayController::class, 'index'])->name('trombinoscope');

Route::get('/cards.json', [CardsDisplayController::class, 'getCardsJson'])->name('cards.json');

Route::get('/pagecontact', [HomeController::class, 'pagecontact'])->name('pagecontact');

// Routes existantes
Route::get('/contact', [AppointmentController::class, 'showForm'])->name('appointments.form');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/appointments/confirm/{appointmentId}', [AppointmentController::class, 'confirmAppointment'])->name('appointments.confirm');

// Routes pour l'authentification Google Calendar
Route::get('/google-calendar/auth', [AppointmentController::class, 'redirectToGoogleAuth'])->name('google-calendar.auth');
Route::get('/google-calendar/callback', [AppointmentController::class, 'handleGoogleCallback'])->name('google-calendar.callback');

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
Route::prefix('admin')->name('admin.')->group(function(){

    //Get Testimonials datas
    Route::get('/testimonials', 'App\Http\Controllers\TestimonialController@index')->name('testimonial.index');

    //Show Testimonial by Id
    Route::get('/testimonials/show/{id}', 'App\Http\Controllers\TestimonialController@show')->name('testimonial.show');

    //Get Testimonials by Id
    Route::get('/testimonials/create', 'App\Http\Controllers\TestimonialController@create')->name('testimonial.create');

    //Edit Testimonial by Id
    Route::get('/testimonials/edit/{id}', 'App\Http\Controllers\TestimonialController@edit')->name('testimonial.edit');

    //Save new Testimonial
    Route::post('/testimonials/store', 'App\Http\Controllers\TestimonialController@store')->name('testimonial.store');

    //Update One Testimonial
    Route::put('/testimonials/update/{testimonial}', 'App\Http\Controllers\TestimonialController@update')->name('testimonial.update');

    //Update One Testimonial Speedly
    Route::put('/testimonials/speed/{testimonial}', 'App\Http\Controllers\TestimonialController@updateSpeed')->name('testimonial.update.speed');

    //Delete Testimonial
    Route::delete('/testimonials/delete/{testimonial}', 'App\Http\Controllers\TestimonialController@delete')->name('testimonial.delete');

});
Route::prefix('admin')->name('admin.')->group(function(){

    //Get Faqs datas
    Route::get('/faqs', 'App\Http\Controllers\FaqController@index')->name('faq.index');

    //Show Faq by Id
    Route::get('/faqs/show/{id}', 'App\Http\Controllers\FaqController@show')->name('faq.show');

    //Get Faqs by Id
    Route::get('/faqs/create', 'App\Http\Controllers\FaqController@create')->name('faq.create');

    //Edit Faq by Id
    Route::get('/faqs/edit/{id}', 'App\Http\Controllers\FaqController@edit')->name('faq.edit');

    //Save new Faq
    Route::post('/faqs/store', 'App\Http\Controllers\FaqController@store')->name('faq.store');

    //Update One Faq
    Route::put('/faqs/update/{faq}', 'App\Http\Controllers\FaqController@update')->name('faq.update');

    //Update One Faq Speedly
    Route::put('/faqs/speed/{faq}', 'App\Http\Controllers\FaqController@updateSpeed')->name('faq.update.speed');

    //Delete Faq
    Route::delete('/faqs/delete/{faq}', 'App\Http\Controllers\FaqController@delete')->name('faq.delete');

});

Route::prefix('admin')->name('admin.')->group(function(){

    //Get Solutions datas
    Route::get('/solutions', 'App\Http\Controllers\SolutionController@index')->name('solution.index');

    //Show Solution by Id
    Route::get('/solutions/show/{id}', 'App\Http\Controllers\SolutionController@show')->name('solution.show');

    //Get Solutions by Id
    Route::get('/solutions/create', 'App\Http\Controllers\SolutionController@create')->name('solution.create');

    //Edit Solution by Id
    Route::get('/solutions/edit/{id}', 'App\Http\Controllers\SolutionController@edit')->name('solution.edit');

    //Save new Solution
    Route::post('/solutions/store', 'App\Http\Controllers\SolutionController@store')->name('solution.store');

    //Update One Solution
    Route::put('/solutions/update/{solution}', 'App\Http\Controllers\SolutionController@update')->name('solution.update');

    //Update One Solution Speedly
    Route::put('/solutions/speed/{solution}', 'App\Http\Controllers\SolutionController@updateSpeed')->name('solution.update.speed');

    //Delete Solution
    Route::delete('/solutions/delete/{solution}', 'App\Http\Controllers\SolutionController@delete')->name('solution.delete');

});
Route::prefix('admin')->name('admin.')->group(function(){

    //Get Infos datas
    Route::get('/infos', 'App\Http\Controllers\InfoController@index')->name('info.index');

    //Show Info by Id
    Route::get('/infos/show/{id}', 'App\Http\Controllers\InfoController@show')->name('info.show');

    //Get Infos by Id
    Route::get('/infos/create', 'App\Http\Controllers\InfoController@create')->name('info.create');

    //Edit Info by Id
    Route::get('/infos/edit/{id}', 'App\Http\Controllers\InfoController@edit')->name('info.edit');

    //Save new Info
    Route::post('/infos/store', 'App\Http\Controllers\InfoController@store')->name('info.store');

    //Update One Info
    Route::put('/infos/update/{info}', 'App\Http\Controllers\InfoController@update')->name('info.update');

    //Update One Info Speedly
    Route::put('/infos/speed/{info}', 'App\Http\Controllers\InfoController@updateSpeed')->name('info.update.speed');

    //Delete Info
    Route::delete('/infos/delete/{info}', 'App\Http\Controllers\InfoController@delete')->name('info.delete');

});
Route::prefix('admin')->name('admin.')->group(function(){

    //Get Contactsujets datas
    Route::get('/contactsujets', 'App\Http\Controllers\ContactsujetController@index')->name('contactsujet.index');

    //Show Contactsujet by Id
    Route::get('/contactsujets/show/{id}', 'App\Http\Controllers\ContactsujetController@show')->name('contactsujet.show');

    //Get Contactsujets by Id
    Route::get('/contactsujets/create', 'App\Http\Controllers\ContactsujetController@create')->name('contactsujet.create');

    //Edit Contactsujet by Id
    Route::get('/contactsujets/edit/{id}', 'App\Http\Controllers\ContactsujetController@edit')->name('contactsujet.edit');

    //Save new Contactsujet
    Route::post('/contactsujets/store', 'App\Http\Controllers\ContactsujetController@store')->name('contactsujet.store');

    //Update One Contactsujet
    Route::put('/contactsujets/update/{contactsujet}', 'App\Http\Controllers\ContactsujetController@update')->name('contactsujet.update');

    //Update One Contactsujet Speedly
    Route::put('/contactsujets/speed/{contactsujet}', 'App\Http\Controllers\ContactsujetController@updateSpeed')->name('contactsujet.update.speed');

    //Delete Contactsujet
    Route::delete('/contactsujets/delete/{contactsujet}', 'App\Http\Controllers\ContactsujetController@delete')->name('contactsujet.delete');

});
Route::prefix('admin')->name('admin.')->group(function(){

    //Get Phonesliders datas
    Route::get('/phonesliders', 'App\Http\Controllers\PhonesliderController@index')->name('phoneslider.index');

    //Show Phoneslider by Id
    Route::get('/phonesliders/show/{id}', 'App\Http\Controllers\PhonesliderController@show')->name('phoneslider.show');

    //Get Phonesliders by Id
    Route::get('/phonesliders/create', 'App\Http\Controllers\PhonesliderController@create')->name('phoneslider.create');

    //Edit Phoneslider by Id
    Route::get('/phonesliders/edit/{id}', 'App\Http\Controllers\PhonesliderController@edit')->name('phoneslider.edit');

    //Save new Phoneslider
    Route::post('/phonesliders/store', 'App\Http\Controllers\PhonesliderController@store')->name('phoneslider.store');

    //Update One Phoneslider
    Route::put('/phonesliders/update/{phoneslider}', 'App\Http\Controllers\PhonesliderController@update')->name('phoneslider.update');

    //Update One Phoneslider Speedly
    Route::put('/phonesliders/speed/{phoneslider}', 'App\Http\Controllers\PhonesliderController@updateSpeed')->name('phoneslider.update.speed');

    //Delete Phoneslider
    Route::delete('/phonesliders/delete/{phoneslider}', 'App\Http\Controllers\PhonesliderController@delete')->name('phoneslider.delete');

});
Route::prefix('admin')->name('admin.')->group(function(){

    //Get Herosliders datas
    Route::get('/herosliders', 'App\Http\Controllers\HerosliderController@index')->name('heroslider.index');

    //Show Heroslider by Id
    Route::get('/herosliders/show/{id}', 'App\Http\Controllers\HerosliderController@show')->name('heroslider.show');

    //Get Herosliders by Id
    Route::get('/herosliders/create', 'App\Http\Controllers\HerosliderController@create')->name('heroslider.create');

    //Edit Heroslider by Id
    Route::get('/herosliders/edit/{id}', 'App\Http\Controllers\HerosliderController@edit')->name('heroslider.edit');

    //Save new Heroslider
    Route::post('/herosliders/store', 'App\Http\Controllers\HerosliderController@store')->name('heroslider.store');

    //Update One Heroslider
    Route::put('/herosliders/update/{heroslider}', 'App\Http\Controllers\HerosliderController@update')->name('heroslider.update');

    //Update One Heroslider Speedly
    Route::put('/herosliders/speed/{heroslider}', 'App\Http\Controllers\HerosliderController@updateSpeed')->name('heroslider.update.speed');

    //Delete Heroslider
    Route::delete('/herosliders/delete/{heroslider}', 'App\Http\Controllers\HerosliderController@delete')->name('heroslider.delete');

});
// Route::prefix('admin')->name('admin.')->group(function(){

//     //Get Cards datas
//     Route::get('/cards', 'App\Http\Controllers\CardsController@index')->name('cards.index');

//     //Show Card by Id
//     Route::get('/cards/show/{id}', 'App\Http\Controllers\CardsController@show')->name('cards.show');

//     //Get Cards by Id
//     Route::get('/cards/create', 'App\Http\Controllers\CardsController@create')->name('cards.create');

//     //Edit Card by Id
//     Route::get('/cards/edit/{id}', 'App\Http\Controllers\CardsController@edit')->name('cards.edit');

//     //Save new Card
//     Route::post('/cards/store', 'App\Http\Controllers\CardsController@store')->name('cards.store');

//     //Update One Card
//     Route::put('/cards/update/{cards}', 'App\Http\Controllers\CardsController@update')->name('cards.update');

//     //Update One Card Speedly
//     Route::put('/cards/speed/{cards}', 'App\Http\Controllers\CardsController@updateSpeed')->name('cards.update.speed');

//     //Delete Card
//     Route::delete('/cards/delete/{cards}', 'App\Http\Controllers\CardsController@delete')->name('cards.delete');

// });

Route::prefix('admin/cards')->name('admin.cards.')->group(function () {
    Route::get('/', [CardsController::class, 'index'])->name('index');
    Route::get('/create', [CardsController::class, 'create'])->name('create');
    Route::post('/', [CardsController::class, 'store'])->name('store');
    Route::get('/show/{id}', [CardsController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [CardsController::class, 'edit'])->name('edit');
    Route::put('/{cards}', [CardsController::class, 'update'])->name('update');
    Route::put('/speed/{cards}', [CardsController::class, 'updateSpeed'])->name('updateSpeed');
    Route::delete('/delete/{cards}', [CardsController::class, 'delete'])->name('delete');
});