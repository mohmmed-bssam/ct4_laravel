<?php

namespace App\Http\Controllers;

use App\Models\Passport;
use App\Models\User;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    public function users(){
        $users = User::with('Passport')->get();
        return view('relations.users',compact('users'));
    }
    public function passport(Passport $passport){
        $passport->load('user');
    dd($passport);
    }
}
