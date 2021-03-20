@extends('layouts.app')
@section('title') Index Page @endsection
@section('content')

<button class="btn btn-success" class="mb-3">Create Post</button>
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
                        <button class="btn btn-info">View</button>
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
          
          
        </tbody>
      </table>
@endsection