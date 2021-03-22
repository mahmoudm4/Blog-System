@extends('layouts.app1')
@section('title') Index Page @endsection
@section('content')

<a href="{{ route('posts.create') }}" class="btn btn-success" class="mb-3">Create Post</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user ? $post->user->name : "User Not Found"}}</td>
                    <td>{{$post->created_at->format("Y-m-d")}}</td>
                    <td>
                        <a href="{{ route('posts.show',['post'=>$post->id]) }}" class="btn btn-info " >View</a>
                        <a href="{{ route('posts.edit',['post'=>$post->id]) }}" class="btn btn-primary">Edit</a>
                        <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('posts.destroy',['post'=>$post->id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
        
      </table>
      
      {{ $posts->links("pagination::bootstrap-4") }}

@endsection