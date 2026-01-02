<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreativeRequest;
use App\Mail\CreativeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CreativeController extends Controller
{
    public function index()
    {
        return view('creative.index');
    }
    public function about()
    {
        return view('creative.about');
    }
    public function service()
    {
        return view('creative.service');
    }
    public function portfolio()
    {
        return view('creative.portfolio');
    }
    public function contact(){
        return view('creative.contact');
    }
    public function contact_email(CreativeRequest $request){
        $data = $request->all();
         $data=$request->validated();
        if($request->hasFile('image')){
            $path = $request->file('image')->store('creative', 'costum');
            $data['image'] = $path;
        }

         Mail::to('malqumbuz@gmail.com')->send(new CreativeMail($data));
        dd('Email sent successfully');
        // return redirect()->route('creative.contact')->with('success','Your message has been sent successfully!');
    }
}
