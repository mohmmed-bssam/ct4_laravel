<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function pages($id){
        return "welcom to page $id";
    }
}
