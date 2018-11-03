<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest',['except'=>'destroy']);
    }

    public function create()
    {
       return view('admins.login');
    }
    public function store()
    {
       if(! auth()->attempt(request(['email','password']))){
           return back();
       }
       return redirect('/posts');

    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/posts');
    }
}
