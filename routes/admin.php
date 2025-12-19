<?php
use Illuminate\Support\Facades\Route;
Route::get('/admin', function () {
    return "Admin Dashboard";
});
Route::get('/admin/users', function () {
    return "Admin Users List";
});

?>
