<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $allposts = Post::paginate(4);
        return view('posts.index',[
            'posts'=> $allposts
        ]);
    }

    public function show($postid)
    {
        $post = Post::find($postid);

        return view('posts.show',[
            'post' =>$post
        ]);
    }

    public function create()
    {
        $users = User::all();
       // dd($users);
        return view('posts.create',[
            'users'=>$users
        ]);
    }

    public function store(Request $request)
    {
        $requestedData = $request->all();
        //dd($requestedData);
        Post::create($requestedData);
        
        //  OR-----------------------------
        // Needs Fillable in Post
        // Post::create([
        //     'title' => request()->title,
        //     'desc'=> request()->desc
        // ]);
        // OR---------------------------------
        // $post = new Post();
        // $post->title = $request->title;
        // $post->desc = $request->desc;
        // $post->save();
        return redirect()->route('posts.index');
    }
    public function edit($postid)
    {
        $post = Post::find($postid);
        $users = User::all();

        return view('posts.edit',[
            'post' =>$post,
            'users' =>$users
        ]);
    }
    public function update(Request $request,$postid)
    {
        $requestedData = $request->all();
        // dd($requestedData['title']);
        Post::where('id', $postid)
        ->update(['title' => $requestedData['title'],
                  'desc' => $requestedData['desc'],
                  'user_id' => $requestedData['user_id']
        ]);
        return redirect()->route('posts.index');
    

    }
}
