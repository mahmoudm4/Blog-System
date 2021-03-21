<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $allposts = Post::all();
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
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Needs Fillable in Post
        // Post::create([
        //     'title' => request()->title,
        //     'desc'=> request()->desc
        // ]);
        // OR
        $post = new Post();
        $post->title = $request->title;
        $post->desc = $request->desc;
        $post->save();
        return redirect()->route('posts.index');
    }
    public function edit()
    {
        $post = ['id' => 1, 'title' => 'Laravel','desc'=>'Laravel is an awesome framework' ,'posted_by' => 'Ali', 'created_at' => '2021-03-04','creator'=>['name'=>'Ali','email'=>'ali@ali.com']];

        return view('posts.edit',[
            'post' =>$post
        ]);
    }
}
