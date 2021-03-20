<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $allposts = [
            ['id' => 1, 'title' => 'Laravel', 'posted_by' => 'Ali', 'created_at' => '2021-03-04','creator'=>['name'=>'Ali','email'=>'ali@ali.com']],
            ['id' => 2, 'title' => 'Java', 'posted_by' => 'Ahmed', 'created_at' => '2021-10-24','creator'=>['name'=>'Ahmed','email'=>'ali@ali.com']],
            ['id' => 3, 'title' => 'C#', 'posted_by' => 'Mahmoud', 'created_at' => '2021-08-14','creator'=>['name'=>'Mahmoud','email'=>'ali@ali.com']]
        ];
        return view('posts.index',[
            'posts'=> $allposts
        ]);
    }

    public function show($postid)
    {
        $post = ['id' => 1, 'title' => 'Laravel','desc'=>'Laravel is an awesome framework' ,'posted_by' => 'Ali', 'created_at' => '2021-03-04','creator'=>['name'=>'Ali','email'=>'ali@ali.com']];

        return view('posts.show',[
            'post' =>$post
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        return redirect()->route('posts.index');
    }
}
