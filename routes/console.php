<?php

use App\Models\Course;
use App\Models\Passport;
use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('cleardata', function () {
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    Course::truncate();
    User::truncate();
    Passport::truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    $this->comment('Data truncated successfully');

})->purpose('Truncate data');
