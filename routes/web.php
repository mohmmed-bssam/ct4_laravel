<?php

use App\Http\Controllers\calcController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CreativeController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::view('/policy','policy');
// Route::get('/',[SiteController::class,'index'])->name('site.home');
// Route::get('/about',[SiteController::class,'about'])->name('site.about');
// Route::get('/contact',[SiteController::class,'contact'])->name('site.contact');
// Route::get('/services',[SiteController::class,'services'])->name('site.services');
// Route::get('/team',[SiteController::class,'team'])->name('site.team');
// Route::get('/news',[SiteController::class,'news'])->name('site.news');
// Route::get('/news/{id}',[SiteController::class,'news_single'])->name('site.news_single');
// Route::get('pages/{id}',[SiteController::class,'pages']);
// Route::resource('posts',PostsController::class);

// Route::get('sum/{a}/{b}',[calcController::class,'sum'])->name('sum');
Route::get('users',[UserController::class,'index'])->name('users.index');
Route::get('freelancer', [FreelancerController::class, 'index'])->name('freelancer.index');
Route::prefix('personal')->name('personal.')->group(function () {
    Route::get('/',[PersonalController::class,'index'])->name('index');
    Route::get('/resume',[PersonalController::class,'resume'])->name('resume');
    Route::get('/projects',[PersonalController::class,'projects'])->name('projects');
    Route::get('/contact',[PersonalController::class,'contact'])->name('contact');
    Route::post('/contact',[PersonalController::class,'contact_email']);

});
Route::prefix('creative')->name('creative.')->group(function () {
    Route::get('/',[CreativeController::class,'index'])->name('index');
    Route::get('/about',[CreativeController::class,'about'])->name('about');
    Route::get('/service',[CreativeController::class,'service'])->name('service');
    Route::get('/portfolio',[CreativeController::class,'portfolio'])->name('portfolio');
    Route::get('/contact',[CreativeController::class,'contact'])->name('contact');
    Route::post('/contact',[CreativeController::class,'contact_email']);
});
Route::get('form1',[FormController::class,'form1'])->name('form1');
Route::post('form1',[FormController::class,'form_data']);
Route::resource('courses', CourseController::class);
