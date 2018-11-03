<?php

namespace App\Http\Controllers;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\Welcome;
use App\Mail;
class AdminController extends Controller
{
   public function create()
   {
       return view('admins.create');
   }
   public function store()
   {
       $this->validate(request(),[
           'name'=>'required',
           'email'=>'required|email',
           'password'=>'required'
       ]);

       $admins=Admin::create(request(['name','email','password']));

       \Mail::to($admins)->send(new Welcome($admins));

       auth()->login($admins);

       session()->flash('message','thanks so much for signning up');


       return redirect('posts');

   }
}
