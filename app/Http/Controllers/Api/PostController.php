<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::paginate(4);
        return PostResource::collection($posts);
    }
    public function show(Post $post){
        
        return new PostResource($post);
    }
    public function store(StorePostRequest $request){

        //dd('we are in store');
        $post = Post::create($request->all());
        return new PostResource($post);
   
    }
}
