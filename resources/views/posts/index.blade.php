@extends('layouts.app')
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
                    <td>{{$post['id']}}</td>
                    <td>{{$post['title']}}</td>
                    <td>{{$post['posted_by']}}</td>
                    <td>{{$post['created_at']}}</td>
                    <td>
                        <a href="{{ route('posts.show',['post'=>$post['id']]) }}" class="btn btn-info " >View</a>
                        <a href="/posts/{{$post['id']}}" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
          
          
        </tbody>
      </table>
@endsection