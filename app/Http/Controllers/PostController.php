<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $allposts = [
            ['id' => 1, 'title' => 'Laravel', 'posted_by' => 'Ali', 'created_at' => '2021-03-04'],
            ['id' => 2, 'title' => 'Java', 'posted_by' => 'Ahmed', 'created_at' => '2021-10-24'],
            ['id' => 3, 'title' => 'C#', 'posted_by' => 'Mahmoud', 'created_at' => '2021-08-14']
        ];
        return view('posts.index',[
            'posts'=> $allposts
        ]);
    }
}
