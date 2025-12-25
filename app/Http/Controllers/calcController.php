<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class calcController extends Controller
{
    public function sum($a, $b){
        $sum = $a + $b;
return view('sum', ['sum' => $sum]);
    }

}
