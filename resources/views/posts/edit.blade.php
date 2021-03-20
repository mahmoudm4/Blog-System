@extends('layouts.app')
@section('content')
<form method="post" action="{{ route('posts.edit',['post'=>$post['id']])}}">>
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" value="{{$post['title']}}">
    </div>
    <div class="form-group">
        <label for="desc">Description</label>
        <textarea type="text" class="form-control" id="desc" >{{$post['desc']}}</textarea>
    </div>
    <div class="form-group">
        <label for="postcreator">Post Creator</label>
        <input type="text" class="form-control" id="postcreator" value="{{$post['posted_by']}}">
      </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
@endsection