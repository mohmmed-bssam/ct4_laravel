<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalRequest;
use App\Mail\ContactUsMail;
use App\Mail\Testmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PersonalController extends Controller
{
    public function index()
    {
        return view('personal.index');
    }

    public function resume()
    {
        return view('personal.resume');
    }

    public function projects()
    {
        return view('personal.projects');
    }

    public function contact()
    {
        return view('personal.contact');
    }
    public function contact_email(PersonalRequest $request){
        // Mail::to('ali@gmail.com')->send(new Testmail());
        $data=$request->validated();
        if($request->hasFile('image')){
            $path = $request->file('image')->store('images', 'costum');
            $data['image'] = $path;
        }
        // dd($data);
         Mail::to('mohmmedbssam97@gmail.com')->send(new ContactUsMail($data));
        dd('Email sent successfully!');

    }
}