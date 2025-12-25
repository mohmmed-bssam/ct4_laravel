<?php

namespace App\Http\Controllers;

use App\Http\Requests\Form1Request;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function form1(){
        return view('form.form1');
    }
    public function form_data(Form1Request $request){
        // $request->validate([
        //     'name'=>'required|max:155',
        //     'email'=>'required|email|ends_with:@gmail.com',
        // ],[
        //     'required'=>'الحقل مطلوب',

        // ]);
        dd($request->all());
    }
}