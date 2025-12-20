<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
// Route::get('/admin', function () {
//     return "Admin Dashboard";
// });
// Route::get('/admin/users', function () {
//     return "Admin Users List";
// });
Route::get('/', [MainController::class, 'home'])->name('front.home');
Route::get('/about', [MainController::class, 'about'])->name('front.about');
Route::get('/contact', [MainController::class, 'contact'])->name('front.contact');


?>
