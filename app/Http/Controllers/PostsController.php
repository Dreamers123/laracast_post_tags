<?php

namespace App\Http\Controllers;
use App\Notifications\PostCreeatedNotification;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use DB;
use App\Tag;
use Carbon\Carbon;
class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except' =>'index','show']);
    }

    public function index()
    {

        $posts = Post::latest()
            ->filter(request(['month','year']))
            ->get();

       /*$archives = Post::selectRaw('year(created_at) year,monthname(created_at) month,count(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) asc')
            ->get()
            ->toArray();*/

        //$posts= Post::orderBy('created_at','desc')->get();

       /* if ($month= request('month'))
        {
            $posts->whereMonth('created_at',Carbon::parse($month)->month);
        }

        if ($year=request('year'))
        {
            $posts->whereYear('created_at',$year);
        }


         $posts= $posts->get();
        */

         //return $archives;

         return view('posts.index',compact('posts'));



    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {


       $this->validate(request(),[
           'title'=>'required',
           'body'=>'required'
       ]);

       $post= Post::create( [
           'title'=> request('title'),
           'body'=> request('body'),
           'user_id'=> auth()->id()
       ]);

       // Post::create($request->all());
       // $user=User::find(auth()->user()->id);
        //$user->notify(new PostCreeatedNotification($post));
        session()->flash('message','Your post has been published');

        return back();

    }


    public function show(Post $post)
    {

        return view('posts.show',compact('post','archives'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
